<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
if (isset($_POST['calonID'])) {
    $calonID = $_POST['calonID'];
    $sql = "UPDATE calon_osis SET jumlah_suara = jumlah_suara + 1 WHERE id_calon = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $calonID);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
    $stmt->close();
}
$conn->close();
?>
