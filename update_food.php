<?php
require 'connect_db.php';

$id = $_POST['id'];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$details = mysqli_real_escape_string($conn, $_POST['details']);

$uploadDir = 'assets/img/uploads/food/';
$newImageName = ''; // ตั้งค่าเริ่มต้นว่าง

// ถ้ามีอัปโหลดรูปใหม่
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $newImageName = time() . '_' . basename($imageName);
    $targetFile = $uploadDir . $newImageName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    move_uploaded_file($imageTmp, $targetFile);

    // ใช้ภาพใหม่
    $sql = "UPDATE food SET name='$name', details='$details', image='$newImageName', updated_at=NOW() WHERE id=$id";
} else {
    // ไม่อัปโหลดภาพใหม่ → ไม่อัปเดตฟิลด์ image
    $sql = "UPDATE food SET name='$name', details='$details', updated_at=NOW() WHERE id=$id";
}

if (mysqli_query($conn, $sql)) {
    header("Location: add_food.php?success=2");
    exit();
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
