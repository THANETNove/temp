<?php
session_start();
require 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $problem_id = $_POST['problem_id'];
    $answer_text = mysqli_real_escape_string($conn, $_POST['answer_text']);
    $doctor_id = $_SESSION['user_id'] ?? null; // หรือใช้ $_SESSION['doctor_id'] ถ้ามี role แยก

    $sql = "UPDATE advice_problems 
            SET answer_text = '$answer_text', 
                answered_at = NOW(), 
                doctor_id = " . ($doctor_id ? "'$doctor_id'" : "NULL") . "
            WHERE id = $problem_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index_doctor.php?success=1");
        exit;
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
