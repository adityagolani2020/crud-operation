<?php 

if (isset($_POST['add_students'])) {

    $f_name = trim($_POST['f_name']);
    $l_name = trim($_POST['l_name']);
    $age = trim($_POST['age']);

    // Check if the first name is empty
    if ($f_name == "" || empty($f_name)) {
        header('location:index.php?message=You need to fill up the first name!');
        exit;
    }

    // Check if the last name is empty
    if ($l_name == "" || empty($l_name)) {
        header('location:index.php?message=You need to fill up the last name!');
        exit;
    }

    // Check if age is empty or not a valid number
    if ($age == "" || !is_numeric($age)) {
        header('location:index.php?message=You need to provide a valid age!');
        exit;
    }

    // Database connection with default credentials
    $conn = new mysqli('localhost', 'root', '', 'crud_operations');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $f_name, $l_name, $age);

    // Execute the statement
    if ($stmt->execute()) {
        header('location:index.php?message=Student added successfully!');
    } else {
        header('location:index.php?message=Error adding student.');
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>


