<?php
session_start();
require 'connect_db.php';

// รับค่าจากฟอร์ม
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// เข้ารหัส password (ใช้ md5 ตามที่คุณใช้ในการสมัครสมาชิก)
$hashed_password = md5($password);

// สร้าง SQL เพื่อตรวจสอบผู้ใช้
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hashed_password' LIMIT 1";
$result = mysqli_query($conn, $sql);

// ตรวจสอบผลลัพธ์
if ($row = mysqli_fetch_assoc($result)) {
    // ถ้าเข้าสู่ระบบสำเร็จ
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name_lastname'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_status'] = $row['status']; // ถ้ามี role เช่น admin, doctor

    // ไปหน้าหลักหรือ dashboard
    //echo 'เข้าสู่ระบบสำเร็จ';

    if ($row['status'] == 1) {
        header("Location: index.php");
    } elseif ($row['status'] == 2) {
        header("Location: index_admin.php");
    } elseif ($row['status'] == 3) {
        header("Location: index_doctor.php");
    }

    exit();
} else {
    // ล้มเหลว กลับไปหน้า login พร้อม error
    echo "<script>alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');window.history.back();</script>";
}

mysqli_close($conn);
