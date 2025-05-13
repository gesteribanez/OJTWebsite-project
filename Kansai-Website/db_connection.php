<?php
$conn = new mysqli("localhost", "root", "", "db_kansai");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 