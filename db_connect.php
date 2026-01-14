<?php
$host = "localhost";   // genelde localhost
$user = "root";        // XAMPP/MAMP default user
$pass = "";            // çoğu zaman boş olur
$db   = "resume_basic";

$conn = new mysqli($host, $user, $pass, $db);

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>
