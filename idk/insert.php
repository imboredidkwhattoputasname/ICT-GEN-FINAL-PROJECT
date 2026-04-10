<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Use the names we found in your Array debug
    $f = $_POST['firstname']; 
    $l = $_POST['lastname'];
    $e = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (first, last, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $f, $l, $e);

    if ($stmt->execute()) {
        // This is the magic line that re-routes the user
        header("Location: thanks.html");
        exit(); // Always call exit() after a header redirect
    } else {
        echo "DB Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>