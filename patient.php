<?php
// ดึงข้อมูลจากฐานข้อมูลด้วย user_id (เช่นผ่าน SESSION)
require 'connect_db.php';
/* session_start();
 */

$sql = "SELECT * FROM users WHERE status = 1";
$result = mysqli_query($conn, $sql);

if ($result) {
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
} else {
    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn);
}

mysqli_close($conn);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="img/logoo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style type="text/css">
    body,
    td,
    th {
        color: #43D0C7;
    }

    .navbar-shrink-dark {
        height: 80px;
        background-color: #212529 !important;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: Montserrat, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    h1 {
        font-size: large;
    }

    h2 {
        font-size: large;
    }

    .modal-body {

        text-align: center;
        padding: 20px;
    }

    .modal-body h2 {
        font-size: 26px;
        font-weight: bold;
        color: #ef742d;

    }

    .modal-body p.item-intro {
        font-size: 18px;
        color: #6c757d;
        margin-bottom: 20px;
    }

    .modal-body img {
        max-width: 100%;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .modal-body ul {
        list-style: none;
        padding: 0;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .modal-body ul li {
        font-size: 16px;
        color: #333;
        background: #f8f9fa;
        padding: 10px;
        width: 80%;
        border-radius: 5px;
        margin-bottom: 5px;
        display: flex;
        justify-content: space-between;
    }

    .modal-body ul li strong {
        color: #ef742d;
    }




    .btn-primary {
        background-color: #ef742d;
        border-color: #ef742d;
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #d95f1e;
        border-color: #d95f1e;
    }

    .form-control {
        text-align: right;
    }

    strong {
        text-align: left;
    }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <div class="navbar-shrink-dark">
        <?php include('navber_admin.php'); ?>
    </div>




    <section class="page-section bg-light mt-5" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">PATIENT</h2>
                <h3 class="section-subheading text-muted">Balance4life</h3>

            </div>
            <div class="row">

                <!-- Portfolio item 1-->

                <?php
                if (isset($users) && is_array($users) && !empty($users)) {
                    foreach ($users as $index => $user) {
                ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal"
                            href="#portfolioModal<?php echo $index + 1; ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/pa.jpg" alt="patient image" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?php echo $user['name_lastname']; ?></div>
                            <div class="portfolio-caption-subheading text-muted">patient <?php echo $index + 1; ?></div>
                        </div>
                    </div>
                </div>

                <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $index + 1; ?>" tabindex="-1"
                    role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal">
                                <img src="assets/img/close-icon.svg" alt="Close modal" />
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/pa.jpg"
                                                alt="..." />

                                            <!-- ปุ่มแก้ไข -->
                                            <button class="btn btn-warning mb-3"
                                                id="edit-btn-<?php echo $user['id']; ?>"
                                                onclick="toggleEdit(<?php echo $user['id']; ?>)">
                                                แก้ไขข้อมูล
                                            </button>

                                            <!-- เริ่มฟอร์มอัปเดตข้อมูล -->
                                            <form action="update_user.php" method="POST">
                                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

                                                <ul class="list-inline">
                                                    <li>
                                                        <strong class="col-6">ชื่อ-นามสกุล:</strong>
                                                        <span
                                                            id="display-name-<?php echo $user['id']; ?>"><?php echo $user['name_lastname']; ?></span>
                                                        <input type="text" name="name_lastname"
                                                            class="form-control d-none"
                                                            id="edit-name-<?php echo $user['id']; ?>"
                                                            value="<?php echo $user['name_lastname']; ?>">
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">Email:</strong>
                                                        <span
                                                            id="display-email-<?php echo $user['id']; ?>"><?php echo $user['email']; ?></span>
                                                        <input type="email" name="email" class="form-control d-none"
                                                            id="edit-email-<?php echo $user['id']; ?>"
                                                            value="<?php echo $user['email']; ?>">
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">อายุ:</strong>
                                                        <span
                                                            id="display-age-<?php echo $user['id']; ?>"><?php echo $user['age']; ?>
                                                            ปี</span>
                                                        <input type="number" name="age" class="form-control d-none"
                                                            id="edit-age-<?php echo $user['id']; ?>"
                                                            value="<?php echo $user['age']; ?>">
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">เพศ:</strong>
                                                        <span
                                                            id="display-gender-<?php echo $user['id']; ?>"><?php echo $user['gender']; ?></span>
                                                        <select name="gender" class="form-control d-none"
                                                            id="edit-gender-<?php echo $user['id']; ?>">
                                                            <option value="ชาย"
                                                                <?php echo ($user['gender'] == 'ชาย') ? 'selected' : ''; ?>>
                                                                ชาย</option>
                                                            <option value="หญิง"
                                                                <?php echo ($user['gender'] == 'หญิง') ? 'selected' : ''; ?>>
                                                                หญิง</option>
                                                            <option value="อื่น ๆ"
                                                                <?php echo ($user['gender'] == 'อื่น ๆ') ? 'selected' : ''; ?>>
                                                                อื่น ๆ</option>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">เลขบัตรประจำตัวประชาชน:</strong>
                                                        <span
                                                            id="display-license-<?php echo $user['id']; ?>"><?php echo $user['license']; ?></span>
                                                        <input type="text" name="license" class="form-control  d-none"
                                                            id="edit-license-<?php echo $user['id']; ?>"
                                                            value="<?php echo $user['license']; ?>">
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">น้ำหนัก (kg):</strong>
                                                        <span
                                                            id="display-weight-<?php echo $user['id']; ?>"><?php echo $user['weight']; ?></span>
                                                        <input type="number" name="weight" class="form-control d-none"
                                                            id="edit-weight-<?php echo $user['id']; ?>"
                                                            value="<?php echo $user['weight']; ?>">
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">ส่วนสูง (cm):</strong>
                                                        <span
                                                            id="display-height-<?php echo $user['id']; ?>"><?php echo $user['height']; ?></span>
                                                        <input type="number" name="height" class="form-control d-none"
                                                            id="edit-height-<?php echo $user['id']; ?>"
                                                            value="<?php echo $user['height']; ?>">
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">ประวัติแพ้ยา:</strong>
                                                        <span
                                                            id="display-allergy-<?php echo $user['id']; ?>"><?php echo $user['allergy']; ?></span>
                                                        <textarea name="allergy" class="form-control d-none"
                                                            id="edit-allergy-<?php echo $user['id']; ?>"><?php echo $user['allergy']; ?></textarea>
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">โรคประจำตัว:</strong>
                                                        <span
                                                            id="display-disease-<?php echo $user['id']; ?>"><?php echo $user['chronic_disease']; ?></span>
                                                        <textarea name="chronic_disease" class="form-control d-none"
                                                            id="edit-disease-<?php echo $user['id']; ?>"><?php echo $user['chronic_disease']; ?></textarea>
                                                    </li>
                                                    <li>
                                                        <strong class="col-6">ที่อยู่:</strong>
                                                        <span
                                                            id="display-address-<?php echo $user['id']; ?>"><?php echo $user['address']; ?></span>
                                                        <textarea name="address" class="form-control d-none"
                                                            id="edit-address-<?php echo $user['id']; ?>"><?php echo $user['address']; ?></textarea>
                                                    </li>
                                                    <input type="hidden" name="status" value="1"> <!-- default: 1 -->
                                                </ul>

                                                <!-- ปุ่มบันทึก -->
                                                <button type="submit" class="btn btn-success d-none mb-3"
                                                    id="save-btn-<?php echo $user['id']; ?>">บันทึก</button>
                                            </form>
                                            <!-- จบฟอร์มอัปเดตข้อมูล -->

                                            <button class="btn btn-primary btn-ml text-uppercase"
                                                id="close-back-<?php echo $user['id']; ?>" data-bs-dismiss="modal"
                                                type="button">
                                                <i class="fas fa-xmark me-1"></i> Close
                                            </button>

                                            <button class="btn btn-secondary  text-uppercase d-none"
                                                id="close-edit-<?php echo $user['id']; ?>" type="button"
                                                onclick="closeEdit(<?php echo $user['id']; ?>)">
                                                <i class="fas fa-times me-1"></i> ปิดการแก้ไข
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                    }
                } else {
                    echo "ไม่พบข้อมูลผู้ใช้";
                }
                ?>
            </div>
        </div>
    </section>

    <script>
    const fields = ["email", "name", "age", "gender", "license", "weight", "height", "allergy", "disease", "address"];

    function toggleEdit(userId) {
        document.getElementById("edit-btn-" + userId).classList.add("d-none"); // ซ่อนปุ่มแก้ไข
        document.getElementById("save-btn-" + userId).classList.remove("d-none"); // แสดงปุ่มบันทึก
        document.getElementById("close-edit-" + userId).classList.remove("d-none"); // ซ่อนปุ่มบันทึก
        fields.forEach(field => {
            document.getElementById("display-" + field + "-" + userId).classList.add("d-none"); // ซ่อนค่าเดิม
            document.getElementById("edit-" + field + "-" + userId).classList.remove("d-none"); // แสดง input
        });

        // ซ่อนปุ่ม Close ปกติ
        document.getElementById("close-back-" + userId).classList.add("d-none");
        // แสดงปุ่ม Close-edit

    }

    function closeEdit(userId) {
        // ซ่อน input fields

        fields.forEach(field => {
            document.getElementById("edit-" + field + "-" + userId).classList.add("d-none"); // ซ่อน input
            document.getElementById("display-" + field + "-" + userId).classList.remove(
                "d-none"); // แสดงค่าดั้งเดิม
        });

        // ซ่อนปุ่มบันทึก
        document.getElementById("save-btn-" + userId).classList.add("d-none"); // ซ่อนปุ่มบันทึก
        document.getElementById("close-edit-" + userId).classList.add("d-none"); // ซ่อนปุ่มบันทึก
        // แสดงปุ่มแก้ไข
        document.getElementById("edit-btn-" + userId).classList.remove("d-none"); // แสดงปุ่มแก้ไข
        document.getElementById("close-back-" + userId).classList.remove("d-none");
    }
    </script>




    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>