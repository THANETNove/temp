<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<p><a href="index_user.php">NEW</a></p>
<p>
  <?php
	include("connect_db.php");
	$sql="SELECT * FROM register_patient";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$name=$row["name"];
		$id=$row["id"];
		$ddmmyy=$row["ddmmyy"];
		$gender=$row["gender"];
		$age=$row["age"];
		$weight=$row["weight"];
		$height=$row["height"];
		$allergy=$row["allergy"];
		$chronic=$row["chronic"];
		$address=$row["address"];
		$email=$row["email"];
		echo"ชื่อ:$name เลขบัตรประจำตัวประชาชน:$id วันเกิด:$ddmmyy เพศ:$gender อายุ:$age น้ำหนัก:$weight ส่วนสูง:$height ประวัติแพ้ยา:$allergy โรคประจำตัว:$chronic ที่อยู่:$address อีเมล:$email";
?>
  <a href="edit_data.php?id_edit=<?php echo"$user_id";?>">Edit</a><br>
</p>
	<?php
	}
	mysqli_close($conn);
	?>
</body>
</html>