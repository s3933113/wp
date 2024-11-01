<?php
$servername = "localhost"; // เปลี่ยนเป็น localhost
$username = "root";
$password = ""; // ใส่รหัสผ่านจริงของคุณ
$dbname = "petsvictoria";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
