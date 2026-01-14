<?php
$conn = new mysqli("localhost", "root", "", "resume_basic");

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company = $_POST['company'];
    $position = $_POST['position'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO work_experiences (company, position, start_date, end_date, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $company, $position, $start_date, $end_date, $description);
    $stmt->execute();
    $stmt->close();

    echo "<p style='color: green;'>Deneyim başarıyla eklendi!</p>";
}

$conn->close();
?>

<form method="post" action="">
    <input type="text" name="company" placeholder="Şirket" required><br><br>
    <input type="text" name="position" placeholder="Pozisyon" required><br><br>
    <input type="date" name="start_date" placeholder="Başlangıç tarihi" required><br><br>
    <input type="date" name="end_date" placeholder="Bitiş tarihi"><br><br>
    <textarea name="description" placeholder="Açıklama"></textarea><br><br>
    <button type="submit">Ekle</button>
</form>
