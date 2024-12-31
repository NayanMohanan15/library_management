<?php
$servername = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Default MySQL password (empty)
$dbname = "library_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$issue_id = $_POST['issue_id'];

$sql = "DELETE FROM issued_books WHERE issue_id = $issue_id";

if ($conn->query($sql) === TRUE) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "message" => $conn->error]);
}

$conn->close();
?>