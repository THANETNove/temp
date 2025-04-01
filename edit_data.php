<?php
$id_edit=$_GET["id_edit"];
echo"$id_edit";
?>
<?php
include("connect_db.php");
$sql="SELECT * FROM user WHERE user_id=$id_edit";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$name=$row["name"];
$lastname=$row["lastname"];
$address=$row["address"];
$tel=$row["tel"];
$gender=$row["gender"];
$department=$row["department"];
$username=$row["username"];
$password=$row["password"];
mysqli_close($conn);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post"
action="update_data.php">
  <p>
    <label for="name">Name:</label>
    <input name="name" type="name" id="name" value="<?php echo"$name";?>">
  </p>
  <p>
    <label for="lastname">lastname:</label>
    <input name="lastname" type="lastname" id="lastname" value="<?php echo"$lastname";?>">
  </p>
  <p>
    <label for="address">address:</label>
    <input name="address" type="address" id="address" value="<?php echo"$address";?>">
  </p>
  <p>
    <label for="tel">tel:</label>
    <input name="tel" type="tel" id="tel" value="<?php echo"$tel";?>">
  </p>
  <p>
    <label for="gender">gender:</label>
    <input name="gender" type="gender" id="gender" value="<?php echo"$gender";?>">
  </p>
  <p>
    <label for="department">department:</label>
    <input name="department" type="department" id="department" value="<?php echo"$department";?>">
  </p>
  <p>
    <label for="username">username:</label>
    <input name="username" type="username" id="username" value="<?php echo"$username";?>">
  </p>
  <p>
    <label for="password">Password:</label>
    <input name="password" type="password" id="password" value="<?php echo"$password";?>">
    <input name="id_edit" type="hidden" id="id_edit" value="<?php echo"$id_edit"?>">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
<p>&nbsp; </p>
</body>
</html>