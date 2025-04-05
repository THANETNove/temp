<?php
// เปิด error reporting เพื่อดีบักง่าย
require 'connect_db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $name = $_POST['name'];
    $details = $_POST['details'];

    // ตรวจสอบว่าอัปโหลดไฟล์หรือไม่
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];

        // โฟลเดอร์ปลายทางที่เก็บภาพ
        $uploadDir = 'assets/img/uploads/food/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // สร้างโฟลเดอร์ถ้ายังไม่มี
        }

        // ตั้งชื่อไฟล์ใหม่เพื่อป้องกันชื่อซ้ำ
        $newImageName = time() . '_' . basename($imageName);
        $targetFile = $uploadDir . $newImageName;

        // ย้ายไฟล์ภาพไปยังโฟลเดอร์
        if (move_uploaded_file($imageTmp, $targetFile)) {
            // บันทึกข้อมูลลงในฐานข้อมูล
            $stmt = $conn->prepare("INSERT INTO food (name, details, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $details, $newImageName);

            if ($stmt->execute()) {
                header("Location: add_food.php?success=1");
            } else {
                echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "ไม่สามารถอัปโหลดไฟล์ได้";
        }
    } else {
        echo "กรุณาเลือกไฟล์ภาพที่ต้องการอัปโหลด";
    }
}

$conn->close();