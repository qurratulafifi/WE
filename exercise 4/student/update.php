<?php
$conn = new mysqli("localhost", "root", "", "studentdatabase");

$matric = $_POST['matric'];
$race = $_POST['race'];
$gender = $_POST['gender'];

// Sanitize inputs (basic)
$matric = $conn->real_escape_string($matric);
$race = $conn->real_escape_string($race);
$gender = $conn->real_escape_string($gender);

// Update query
$sql = "UPDATE STUDENT SET Race='$race', Gender='$gender' WHERE Matric='$matric'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully. <a href='list.php'>Back to list</a>";
} else {
    echo "Error updating record: " . $conn->error;
}
?>
