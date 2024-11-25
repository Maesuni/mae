<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM students");
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Students List</h1>
    <a href="create.php"><button>Add New Student</button></a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Course & Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= $student['firstname'] ?></td>
                    <td><?= $student['middlename'] ?></td>
                    <td><?= $student['lastname'] ?></td>
                    <td><?= $student['age'] ?></td>
                    <td><?= $student['address'] ?></td>
                    <td><?= $student['course_section'] ?></td>
                    <td>
                       
    <a href="edit.php?id=<?= $student['id'] ?>" class="btn edit-btn">Edit</a>
    <a href="delete.php?id=<?= $student['id'] ?>" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
</td>

                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
