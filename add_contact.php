<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$user_id = $_SESSION['user_id'];

mysqli_query($conn, "INSERT INTO contacts (user_id, name, email, phone) VALUES ($user_id, '$name', '$email', '$phone')");
header("Location: dashboard.php");
?>
