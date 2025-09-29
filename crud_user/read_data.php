<?php
include 'connect.php';
include 'delete.php'; // Include file delete.php untuk memanggil fungsi deleteRecord

// Cek apakah ada permintaan penghapusan
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Panggil fungsi deleteRecord
    if (deleteRecord($conn, $delete_id)) {
        echo "Record with ID $delete_id deleted successfully.<br>";
    } else {
        echo "Failed to delete record with ID $delete_id.<br>";
    }
}

// Query untuk membaca semua data dari tabel users
$sql = "SELECT * FROM users"; // SQL query untuk membaca semua record
$result = $conn->query($sql); // Eksekusi query

// Cek apakah ada record yang ditemukan
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Full Name</th>
        <th>Registered Date</th>
        <th>Actions</th>
        </tr>";
    $no = 1;
    // Loop melalui semua record dan tampilkan
    while ($row = $result->fetch_assoc()) {

        // Display the user details in a table
        echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['password'] . "</td>
                <td>" . $row['fullname'] . "</td>
                <td>" . $row['reg_date'] . "</td>
                <td>
                    <a href='update_form.php?id=" . $row['id'] . "'>Edit</a> |
                    <a href='read_data.php?delete_id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

// Tutup koneksi
$conn->close();
?>