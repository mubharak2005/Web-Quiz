<?php
include 'db.php';

$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $conn->query("UPDATE users SET username='$username' WHERE id=$id");
    header("Location: index.php");
    exit;
}

$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>

<form method="POST">
    Edit Username:
    <input type="text" name="username" value="<?php echo $user['username']; ?>">
    <button type="submit">Update</button>
</form>
