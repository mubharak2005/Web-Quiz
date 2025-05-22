<?php
include 'db.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Hapus User
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: index.php");
}
?>

<h3>Selamat datang, <?php echo $_SESSION['username']; ?></h3>
<a href="logout.php">Logout</a>
<h3>Tambah User</h3>
<form method="POST" action="register.php">
    Username: <input type="text" name="username">
    Password: <input type="password" name="password">
    <button type="submit">Add</button>
</form>

<h3>Daftar User</h3>
<table border="1">
    <tr><th>Username</th><th>Aksi</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['username']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> | 
                <a href='?delete={$row['id']}'>Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>
