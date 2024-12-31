<?php
$servername = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Default MySQL password (empty)
$dbname = "library_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['book_title'];
$author = $_POST['book_author'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];

$sql = "INSERT INTO issued_books (title, author, user_name, user_email) 
        VALUES ('$title', '$author', '$user_name', '$user_email')";

if ($conn->query($sql) === TRUE) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "message" => $conn->error]);
}

$conn->close();
?>