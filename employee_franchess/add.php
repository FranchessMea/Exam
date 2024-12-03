<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO employees (name, position, salary, hire_date, email, department, phone, address)
            VALUES ('$name', '$position', '$salary', '$hire_date', '$email', '$department', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Add New Employee</h1>
    </header>

    <div class="container">
        <form method="POST" action="add.php">
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Position:</label>
            <input type="text" name="position">

            <label>Salary:</label>
            <input type="number" name="salary">

            <label>Hire Date:</label>
            <input type="date" name="hire_date">

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Department:</label>
            <input type="text" name="department">

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Address:</label>
            <textarea name="address"></textarea>

            <button type="submit" class="btn btn-submit">Add Employee</button>
        </form>
    </div>
</body>
</html>
