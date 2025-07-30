<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$contacts = mysqli_query($conn, "SELECT * FROM contacts WHERE user_id=$user_id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <h2>Contact Book</h2>
    <a href="logout.php">Logout</a>
    <form action="add_contact.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Phone">
        <button type="submit">Add Contact</button>
    </form>

    <input type="text" id="searchInput" onkeyup="searchContacts()" placeholder="Search contacts...">

    <table id="contactsTable" border="1">
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>
        <?php while ($row = mysqli_fetch_assoc($contacts)) { ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td>
                <a href="edit_contact.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete_contact.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
