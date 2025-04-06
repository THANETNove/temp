<?php
require 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $status = $_POST['status'];

    $sql = "UPDATE appointments SET status = ?, updated_at = NOW() WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $status, $appointment_id);
    mysqli_stmt_execute($stmt);

    header("Location: index_doctor.php?success=1");
    exit;
}
