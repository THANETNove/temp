<?php
require 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = $_POST['doctor_id'];       // ค่า doctor_id ที่เลือก
    $appointment_id = $_POST['appointment_id']; // ID นัดหมายที่ต้องการอัปเดต

    if ($doctor_id && $appointment_id) {
        $sql = "UPDATE appointments SET doctor_id = ?, updated_at = NOW() WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $doctor_id, $appointment_id);
        mysqli_stmt_execute($stmt);
    }

    header("Location: index_admin.php?success=1");
    exit;
}
