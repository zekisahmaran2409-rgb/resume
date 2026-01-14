<?php
include("db_connect.php"); // DB bağlantısı

$sql = "SELECT company, position, start_date, end_date, description 
        FROM work_experiences 
        WHERE profile_id = 1 
        ORDER BY start_date DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<strong>" . $row["position"] . "</strong> @ " . $row["company"] . "<br>";
        echo "Dates: " . $row["start_date"] . " - " . ($row["end_date"] ?? "Present") . "<br>";
        echo $row["description"];
        echo "</li><br>";
    }
    echo "</ul>";
} else {
    echo "No work experiences found.";
}

$conn->close();
?>
