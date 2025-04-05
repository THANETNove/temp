<?php
require 'connect_db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // 1. ดึงชื่อไฟล์ภาพจากฐานข้อมูล
    $sql = "SELECT image FROM food WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $imagePath = 'assets/img/uploads/food/' . $row['image'];

        // 2. ลบไฟล์ภาพถ้ามีจริง
        if (file_exists($imagePath)) {
            unlink($imagePath); // ลบไฟล์ภาพออกจากเซิร์ฟเวอร์
        }

        // 3. ลบข้อมูลในฐานข้อมูล
        $deleteSQL = "DELETE FROM food WHERE id = $id";
        if (mysqli_query($conn, $deleteSQL)) {
            header("Location: add_food.php?success=3"); // success=3 → ลบสำเร็จ
            exit();
        } else {
            echo "เกิดข้อผิดพลาดในการลบข้อมูล: " . mysqli_error($conn);
        }
    } else {
        echo "ไม่พบข้อมูล";
    }

    mysqli_close($conn);
}
