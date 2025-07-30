<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

mysqli_query($conn, "UPDATE contacts SET name='$name', email='$email', phone='$phone' WHERE id=$id");
header("Location: dashboard.php");
?>
