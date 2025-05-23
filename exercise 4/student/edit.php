<?php
$conn = new mysqli("localhost", "root", "", "studentdatabase");

$showForm = true;
$student = null;
$error = "";

// Step 1: Check if user submitted a matric number
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['matric'])) {
    $matric = $_POST['matric'];
    $result = $conn->query("SELECT * FROM STUDENT WHERE Matric = '$matric'");

    if ($result && $result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $showForm = false; // move to the update form
    } else {
        $error = "Matric number not found.";
    }
}
?>

<!-- Step 2: Search Form -->
<?php if ($showForm): ?>
    <form method="post">
        <label>Enter Matric Number to Edit:</label>
        <input type="text" name="matric" required>
        <input type="submit" value="Search">
        <p style="color:red;"><?php echo $error; ?></p>
    </form>
<?php endif; ?>

<!-- Step 3: Edit Form -->
<?php if ($student): ?>
    <form action="update.php" method="post">
        <input type="hidden" name="matric" value="<?php echo $student['Matric']; ?>">
        Name: <?php echo $student['Name']; ?><br>
        Email: <?php echo $student['Email']; ?><br>
        Race: <input type="text" name="race" value="<?php echo $student['Race']; ?>"><br>
        Gender:
        <select name="gender">
            <option value="Male" <?php if($student['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($student['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select><br>
        <input type="submit" value="Update">
    </form>
<?php endif; ?>
