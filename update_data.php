<?php
$name=$_POST['name'];
$id=$_POST['id'];
$ddmmyy=$_POST['ddmmyy'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$weight=$_POST['weight'];
$height=$_POST['height'];
$allergy=$_POST['allergy'];
$chronic=$_POST['chronic'];
$address=$_POST['address'];
$email=$_POST['email'];
echo"ชื่อ : $name <br>";
echo"เลขบัตรประจำตัวประชาชน : $id <br>";
echo"วันเกิด : $ddmmyy <br>";
echo"เพศ : $gender <br>";
echo"อายุ : $age <br>";
echo"น้ำหนัก : $weight <br>";
echo"ส่วนสูง : $height <br>";
echo"ประวัติแพ้ยา : $allergy <br>";
echo"โรคประจำตัว : $chronic <br>";
echo"ที่อยู่ : $address <br>";
echo"อีเมล : $email <br>";
?>
<?php
include("connect_db.php");
$sql="UPDATE SET name='$name',id='$id',ddmmyy='$ddmmyy',gender='$gender',age='$age',weight='$dweight',height='$height',allergy='$allergy',chronic='$chronic',address='$address',email='$email' WHERE name='$name'";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<a href="user_show.php">HOME
</a>
</body>
</html>