<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $f = $_POST['first']; 
    $l = $_POST['last'];
    $e = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (first, last, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $f, $l, $e);

    if ($stmt->execute()) {
        header("Location: thanks.html");
        exit();
    } else {
        echo "DB Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
