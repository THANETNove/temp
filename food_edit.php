<?php
require 'connect_db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM food WHERE id=$id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<h2>แก้ไขเมนูอาหาร</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>ชื่อเมนู:</label><br>
    <input type="text" name="name" value="<?= $data['name'] ?>"><br><br>

    <label>รายละเอียด:</label><br>
    <textarea name="details"><?= $data['details'] ?></textarea><br><br>

    <label>ชื่อไฟล์รูปภาพ:</label><br>
    <input type="text" name="image" value="<?= $data['image'] ?>"><br><br>

    <input type="submit" value="บันทึกการแก้ไข">
</form>