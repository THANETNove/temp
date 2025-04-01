<?php
$name=$_POST['name'];
$id=$_POST['id'];
$ddmmyy=$_POST['ddmmyy'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$medical=$_POST['medical'];
$address=$_POST['address'];
$email=$_POST['email'];
echo"ชื่อ : $name <br>";
echo"เลขบัตรประจำตัวประชาชน : $id <br>";
echo"วันเกิด : $ddmmyy <br>";
echo"เพศ : $gender <br>";
echo"อายุ : $age <br>";
echo"เลขที่ใบประกอบวิชาชีพ : $medical <br>";
echo"ที่อยู่ : $address <br>";
echo"อีเมล : $email <br>";
?>
<?php
include("connect_db.php");
$sql="INSERT INTO 'register_doc' VALUES('$name','$id','$ddmmyy','$gender','$age','$medical','$address','$email')";
$result=$conn->query($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<br>
<a href="index_pateintt.php">HOME
</a>
</body>
</html>