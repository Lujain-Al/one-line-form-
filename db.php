<?php
$conn = new mysqli('localhost', 'root', '', 'sampledb');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>
