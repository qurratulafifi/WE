<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "studentdatabase");

$conditions = [];
if (isset($_GET['race']) && $_GET['race'] != '') {
    $race = $_GET['race'];
    $conditions[] = "Race = '$race'";
}
if (isset($_GET['gender']) && $_GET['gender'] != '') {
    $gender = $_GET['gender'];
    $conditions[] = "Gender = '$gender'";
}

$filter = '';
if (!empty($conditions)) {
    $filter = "WHERE " . implode(" AND ", $conditions);
}

$result = $conn->query("SELECT * FROM STUDENT $filter");
?>

<form method="get">
    Search by Race:
    <select name="race">
        <option value="">-- Select Race --</option>
        <option value="Malay" <?= (isset($_GET['race']) && $_GET['race'] == 'Malay') ? 'selected' : '' ?>>Malay</option>
        <option value="Chinese" <?= (isset($_GET['race']) && $_GET['race'] == 'Chinese') ? 'selected' : '' ?>>Chinese</option>
        <option value="Indian" <?= (isset($_GET['race']) && $_GET['race'] == 'Indian') ? 'selected' : '' ?>>Indian</option>
    </select>

    Search by Gender:
    <select name="gender">
        <option value="">-- Select Gender --</option>
        <option value="Male" <?= (isset($_GET['gender']) && $_GET['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= (isset($_GET['gender']) && $_GET['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
    </select>

    <input type="submit" value="Search">
    <a href="list.php"><button type="button">Reset</button></a>
</form>

<table border="1">
    <tr><th>Matric</th><th>Name</th><th>Email</th><th>Race</th><th>Gender</th><th>Action</th></tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['Matric'] ?></td>
        <td><?= $row['Name'] ?></td>
        <td><?= $row['Email'] ?></td>
        <td><?= $row['Race'] ?></td>
        <td><?= $row['Gender'] ?></td>
        <td><a href="edit.php?matric=<?= $row['Matric'] ?>">Edit</a></td>
    </tr>
    <?php } ?>
</table>
