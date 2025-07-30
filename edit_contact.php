<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM contacts WHERE id=$id");
$contact = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Contact</h2>
    <form action="update_contact.php" method="POST">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <input type="text" name="name" value="<?= $contact['name'] ?>" required>
        <input type="email" name="email" value="<?= $contact['email'] ?>">
        <input type="text" name="phone" value="<?= $contact['phone'] ?>">
        <button type="submit">Update</button>
    </form>
</body>
</html>
