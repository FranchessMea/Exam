<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM employees WHERE employeeID = $id";
    $result = $conn->query($sql);
    $employee = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE employees SET name='$name', position='$position', salary='$salary', hire_date='$hire_date',
            email='$email', department='$department', phone='$phone', address='$address' WHERE employeeID=$id";

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
    <title>Edit Employee</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Edit Employee</h1>
    </header>

    <div class="container">
        <form method="POST" action="edit.php?id=<?php echo $employee['employeeID']; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $employee['name']; ?>" required>

            <label>Position:</label>
            <input type="text" name="position" value="<?php echo $employee['position']; ?>">

            <label>Salary:</label>
            <input type="number" name="salary" value="<?php echo $employee['salary']; ?>">

            <label>Hire Date:</label>
            <input type="date" name="hire_date" value="<?php echo $employee['hire_date']; ?>">

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $employee['email']; ?>" required>

            <label>Department:</label>
            <input type="text" name="department" value="<?php echo $employee['department']; ?>">

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $employee['phone']; ?>">

            <label>Address:</label>
            <textarea name="address"><?php echo $employee['address']; ?></textarea>

            <button type="submit" class="btn btn-submit">Update Employee</button>
        </form>
    </div>
</body>
</html>
