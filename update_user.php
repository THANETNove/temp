<?php
require 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $name_lastname = $_POST['name_lastname'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $allergy = $_POST['allergy'];
    $chronic_disease = $_POST['chronic_disease'];
    $address = $_POST['address'];
    $email = $_POST['email']; //
    $tel = $_POST['tel']; //
    $medical = $_POST['medical']; //
    $license = $_POST['license'];
    $status = $_POST['status'];

    $sql = "UPDATE users SET 
                name_lastname = '$name_lastname',
                age = '$age',
                gender = '$gender',
                license = '$license',
                email = '$email',
                weight = '$weight',
                tel = '$tel',
                medical = '$medical',
                height = '$height',
                allergy = '$allergy',
                chronic_disease = '$chronic_disease',
                address = '$address'
            WHERE id = '$user_id'";

    if (mysqli_query($conn, $sql)) {
        if ($status == 1) {
            header("Location: patient.php");
        } elseif ($status == 2) {
            header("Location: index_admin.php");
        } elseif ($status == 3) {
            header("Location: doctor.php");
        }
    } else {
        /*  echo "Error: " . mysqli_error($conn); */
    }

    mysqli_close($conn);
}
