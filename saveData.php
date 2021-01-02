<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "data";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $data = json_decode(file_get_contents("php://input"), true);
  $sql = "INSERT INTO nsfw (url, message) VALUES ('".$data["url"]."', '".$data["message"]."')";
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
?>