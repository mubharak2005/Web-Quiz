<?php
$conn = new mysqli("localhost", "root", "", "user_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
