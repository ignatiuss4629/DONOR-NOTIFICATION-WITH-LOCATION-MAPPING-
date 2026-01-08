<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "person_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['blood_group']) && isset($_POST['message'])) {
    $blood_group = $_POST['blood_group'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (blood_group, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $blood_group, $message);
    
    if ($stmt->execute()) {
        echo "Message saved successfully!";
    } else {
        echo "Error saving message.";
    }

    $stmt->close();
}

$conn->close();
?>
e:\BB\need_blood.php