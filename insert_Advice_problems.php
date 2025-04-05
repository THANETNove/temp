<?php
session_start(); // ⭐ สำคัญ ต้องมี session_start()

require 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo "กรุณาเข้าสู่ระบบก่อนส่งคำถาม";
        exit;
    }

    $user_id = intval($_SESSION['user_id']);
    $advice_id = intval($_POST['advice_id']);
    $problem_text = mysqli_real_escape_string($conn, $_POST['problem_text']);

    $sql = "INSERT INTO advice_problems (user_id, advice_id, problem_text) 
            VALUES ('$user_id', '$advice_id', '$problem_text')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
