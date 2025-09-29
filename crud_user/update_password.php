<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id     = $_POST['id'];
    $uname  = $_POST['uname'];
    $oldPwd = $_POST['psw'];   // password lama (input)
    $newPwd = $_POST['pass'];  // password baru
    $fname  = $_POST['fname'];

    // Ambil password hash dari database
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Verifikasi password lama dengan hash di database
        if (password_verify($oldPwd, $row['password'])) {
            // Hash password baru sebelum simpan
            $hashedNew = password_hash($newPwd, PASSWORD_DEFAULT);

            // Update data user
            $update = "UPDATE users SET username = ?, password = ?, fullname = ? WHERE id = ?";
            $stmt2 = $conn->prepare($update);
            $stmt2->bind_param("sssi", $uname, $hashedNew, $fname, $id);

            if ($stmt2->execute()) {
                echo "Password berhasil diubah.<br><br>";
                echo "<button type='button' onclick=\"window.location.href='read_data.php';\">View All Record</button>";
            } else {
                echo "Error: " . $stmt2->error;
            }
        } else {
            echo "Password lama tidak sesuai!";
        }
    } else {
        echo "User tidak ditemukan!";
    }
}
$conn->close();
?>

