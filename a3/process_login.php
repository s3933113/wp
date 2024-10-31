<?php
session_start();

// ข้อมูลเข้าสู่ระบบจำลอง (สำหรับการทดสอบ)
$correctUsername = "s3933113"; // แทนที่ด้วยชื่อผู้ใช้จริง
$correctPassword = "xxxxxxxx"; // แทนที่ด้วยรหัสผ่านจริง

// รับข้อมูลจากฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// ตรวจสอบข้อมูลเข้าสู่ระบบ
if ($username === $correctUsername && $password === $correctPassword) {
    // ตั้งค่าตัวแปรเซสชันเพื่อบอกว่าผู้ใช้เข้าสู่ระบบแล้ว
    $_SESSION['username'] = $username;

    // เปลี่ยนเส้นทางไปยังหน้า user.php
    header("Location: user.php");
    exit();
} else {
    // กรณีที่ข้อมูลเข้าสู่ระบบไม่ถูกต้อง
    echo "<p>Incorrect username or password. Please try again.</p>";
    // เพิ่มลิงก์กลับไปที่หน้าเข้าสู่ระบบ
    echo "<a href='login.php'>Back to login</a>";
}
?>
