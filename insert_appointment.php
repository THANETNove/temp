<?php
require 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];
    $symptoms = mysqli_real_escape_string($conn, $_POST['symptoms']);

    $sql = "INSERT INTO appointments (user_id, appointment_date, appointment_time, symptoms)
            VALUES ('$user_id', '$date', '$time', '$symptoms')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?success=2");
        exit;
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
