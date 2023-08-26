<?php
// Hai, ini kodenya buat ajarin si komputer main rumah-rumahan.
// Tapi, ya, enggak semudah main lego sih. Si komputer ini agak pelit senyum. 😒

$servername = "localhost";  // Ini alamat rumah si database
$username = "root";         // Panggilannya si database
$password = "";             // Kunci pintunya, tapi jangan dijaga naga
$dbname = "vote";           // Buku catatan yang enggak ada gambar, cuma tulisan

$conn = new mysqli($servername, $username, $password, $dbname); // Si komputer kita ngejenguk si database

if ($conn->connect_error) {
    die("Wah, nggak bisa masuk rumah si database nih. 😫: " . $conn->connect_error); // Kalau si database lagi ngambek, ya kita nunggu aja
}

// Nah, sekarang kita mau "minjem" kartu tanda pengenal si calon. Biasa, buat dihitung-hitung suaranya.
if (isset($_POST['calonID'])) {
    $calonID = $_POST['calonID']; // Ini kayak bawaan pas main 'tukeran kartu'

    // Abis itu, kita minta izin tuan rumah si database, buat ngubah suara calon yang diinginkan.
    $sql = "UPDATE calon_osis SET jumlah_suara = jumlah_suara + 1 WHERE id_calon = ?"; // Ini kayak minta pergi main sama si calon
    $stmt = $conn->prepare($sql); // Siap-siap buat main rumah-rumahan

    if ($stmt->execute()) {
        echo "Wuih, tiba-tiba suaranya nambah! Tapi jangan harap senyum-senyum, ya. 😑"; // Kalau mainnya berhasil, si komputer juga enggak bakal lepas senyum
    } else {
        echo "Eh, kok suaranya malah ilang gitu? Mungkin habis dimakan tikus. 😓"; // Kalau ada halangan, ya suaranya bisa jadi hilang gitu aja
    }

    $stmt->close(); // Udah cukup main rumah-rumahan, sekarang kita tutup pintu keluar biar si komputer enggak keluar nyari 'null' di kegelapan.

}

$conn->close(); // Baiklah, mari kita akhiri pesta rumah-rumahan ini. Si komputer pun diam dalam kegelapan, ditemani oleh kodenya yang tak pernah berhenti bergumam tentang kesalahan-kesalahan yang tak terlihat.
?>
