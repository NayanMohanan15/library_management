<?php
$servername = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Default MySQL password (empty)
$dbname = "library_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM issued_books";
$result = $conn->query($sql);

$issuedBooks = [];
while ($row = $result->fetch_assoc()) {
  $issuedBooks[] = $row;
}

echo json_encode($issuedBooks);

$conn->close();
?>