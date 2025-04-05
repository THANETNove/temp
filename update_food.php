<?php
require 'connect_db.php';

$id = $_POST['id'];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$details = mysqli_real_escape_string($conn, $_POST['details']);
$image = mysqli_real_escape_string($conn, $_POST['image']);

$sql = "UPDATE food SET name='$name', details='$details', image='$image', updated_at=NOW() WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "อัปเดตข้อมูลเรียบร้อย <a href='index.php'>กลับไปหน้าหลัก</a>";
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);