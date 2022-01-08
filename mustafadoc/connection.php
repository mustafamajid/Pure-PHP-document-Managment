
<?php
// Create connection
$conn = new mysqli("localhost", "root", "",  "archiv");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8");
$cfg['DefaultCharset'] = 'utf8';
$cfg['DefaultConnectionCollation'] = 'utf8_general_ci';
?>