<?php

include 'connect.php';

$Username = $_POST['uname'];
$Password = $_POST['psw'];

$sql = "SELECT username, password from users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($Password, $row['password'])) {
        header('Location: menu.php');
        exit;
    } else {
        echo "Username atau Password salah!";
        echo "<br><a href='login.php'>Kembali</a>";
    }
} else {
    echo "Username tidak ditemukan!";
    echo "<br><a href='login.php'>Kembali</a>";
}

$conn->close();
?>