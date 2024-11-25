<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE students SET firstname = ?, middlename = ?, lastname = ?, age = ?, address = ?, course_section = ? WHERE id = ?");
    $stmt->execute([$_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['age'], $_POST['address'], $_POST['course_section'], $id]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Edit Student</h1>
    <form method="POST">
        <label>First Name:</label>
        <input type="text" name="firstname" value="<?= $student['firstname'] ?>" required><br>
        <label>Middle Name:</label>
        <input type="text" name="middlename" value="<?= $student['middlename'] ?>" required><br>
        <label>Last Name:</label>
        <input type="text" name="lastname" value="<?= $student['lastname'] ?>" required><br>
        <label>Age:</label>
        <input type="number" name="age" value="<?= $student['age'] ?>" required><br>
        <label>Address:</label>
        <input type="text" name="address" value="<?= $student['address'] ?>" required><br>
        <label>Course & Section:</label>
        <input type="text" name="course_section" value="<?= $student['course_section'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
