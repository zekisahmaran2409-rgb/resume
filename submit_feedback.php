<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO feedback (email, message) VALUES ('$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // 2 seçenek: Success mesajı ve geri yönlendirme
        header("Location: index.php?feedback=success");
        exit;
    } else {
        header("Location: index.php?feedback=error");
        exit;
    }
}

$conn->close();
?>
