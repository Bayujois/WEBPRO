<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id     = $_POST['id'];
    $uname  = $_POST['uname'];
    $newPwd = $_POST['psw'];  // password baru
    $fname  = $_POST['fname'];

    // Ambil password hash dari database
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

     // Update data user
    $update = "UPDATE users SET username = ?, password = ?, fullname = ? WHERE id = ?";
    $stmt2 = $conn->prepare($update);
    $stmt2->bind_param("sssi", $uname, $newPwd, $fname, $id);

    echo "Record berhasil diubah.<br><br>";
    echo "<button type='button' onclick=\"window.location.href='read_data.php';\">View All Record</button>";
}else {
    echo "User tidak ditemukan!";
}   
$conn->close();
?>

