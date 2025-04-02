<?php
// เปิด error reporting เพื่อดีบักง่าย
require 'connect_db.php';


// รับค่าจากฟอร์ม
$name_lastname     = $_POST['name_lastname'];
$date              = $_POST['date'];
$gender            = $_POST['gender'];
$age               = $_POST['age'];
$weight            = $_POST['weight'];
$height            = $_POST['height'];
$allergy           = $_POST['allergy'];
$chronic_disease   = $_POST['chronic_disease'];
$address           = $_POST['address'];
$email             = $_POST['email'];
$tel               = $_POST['tel'];
$medical           = $_POST['medical'];
$license           = $_POST['license'];
$password           = md5($_POST['password']);
$status            = $_POST['status']; // กำหนดค่า default เป็น 1 ถ้าไม่ได้ส่งมา
// SQL บันทึกข้อมูล
$sql = "INSERT INTO users (
  name_lastname, date, gender, age, weight, height,
  allergy, chronic_disease, address, email, tel, medical, license,password, status
) VALUES (
  '$name_lastname', '$date', '$gender', $age, '$weight', '$height',
  '$allergy', '$chronic_disease', '$address', '$email', '$tel', '$medical', '$license','$password', $status
)";
//echo $sql; // สำหรับดีบัก

// ทำการ execute
if (mysqli_query($conn, $sql)) {
    //   echo "สมัครสมาชิกสำเร็จ";
    // redirect กลับหน้าหลัก หรือโชว์ลิงก์ย้อนกลับก็ได้
    header("Location: index.php");
} else {
    // echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
