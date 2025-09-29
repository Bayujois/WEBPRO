<?php
include 'connect.php';

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $fullname = $_POST['fname'];
    $cpass = $_POST['cpsw'];

    if ($password !== $cpass) {
         echo "<script>alert('Password dan Confirm Password tidak sama!');window.history.back();</script>";
            exit();
         }

    // Hash password untuk keamanan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Query insert data
    $sql = "INSERT INTO users (username, password, fullname) VALUES ('$username','$hashedPassword', '$fullname')";

    if ($conn->query($sql) === TRUE) {
        echo "User successfully registered.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
echo " <br> <button type='button' onclick=\"window.location.href='login.php';\">Login Form</button><br>";
$conn->close();
?>