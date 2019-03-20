<?php
$server="localhost";
$user="u365092369_gtusr";
$pass="EPc#nBrsw[fz4w`zVM";
$db="u365092369_gatwa";
$conn = new mysqli($server, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
	echo "Connection failed: " . $conn->connect_error;
}