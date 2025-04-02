<?php
session_start();         // เริ่มต้น session
session_destroy();       // ล้างข้อมูล session ทั้งหมด
header("Location: login.php"); // กลับไปหน้า login (หรือหน้าแรก)
exit();
