<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_name = $_POST['employee_name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO employees (employee_name, contact_no, username, password) VALUES ('$employee_name', '$contact_no', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?registered=true"); // Redirect to login with a 'registered' query parameter
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

