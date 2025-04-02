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
            padding-top: 1rem;
            padding-bottom: 1rem;
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
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-shrink-dark" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index_admin.php"><img src="img/fine.svg" alt="..." width="160" height="1600" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i></button>
            <?php session_start(); ?>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index_admin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Advice</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Food</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#portfolio">Patient</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctor.php">Doctor</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#contact">Advise for patient</a></li> -->
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="regis_patient.php">Register</a></li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-capitalize" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                สวัสดีคุณ <?php echo $_SESSION['user_name']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="profile.php">โปรไฟล์</a></li>
                                <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                            </ul>
                        </li>


                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>


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
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $index + 1; ?>">
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

                        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $index + 1; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="modal-body">
                                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/pa.jpg" alt="..." />
                                                    <h4 class="mb-4">ชื่อ-นามสกุล: <?php echo $user['name_lastname']; ?></h4>
                                                    <ul class="list-inline">
                                                        <li>
                                                            <strong>อายุ:</strong>
                                                            <?php echo $user['age']; ?> ปี
                                                        </li>
                                                        <li>
                                                            <strong>เพศ:</strong>
                                                            <?php echo $user['gender']; ?>
                                                        </li>
                                                        <li>
                                                            <strong>เลขบัตรประจำตัวประชาชน:</strong>
                                                            <?php echo $user['license']; ?>
                                                        </li>
                                                        <li>
                                                            <strong>น้ำหนัก (kg):</strong>
                                                            <?php echo $user['weight']; ?>
                                                        </li>
                                                        <li>
                                                            <strong>ส่วนสูง (cm):</strong>
                                                            <?php echo $user['height']; ?>
                                                        </li>
                                                        <li>
                                                            <strong>ประวัติแพ้ยา:</strong>
                                                            <?php echo $user['allergy']; ?>
                                                        </li>
                                                        <li>
                                                            <strong>โรคประจำตัว:</strong>
                                                            <?php echo $user['chronic_disease']; ?>
                                                        </li>
                                                        <li>
                                                            <strong>ที่อยู่:</strong>
                                                            <?php echo $user['address']; ?>
                                                        </li>
                                                    </ul>
                                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                        <i class="fas fa-xmark me-1"></i>
                                                        Close
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

    <!--     <div class="col-md-6 mb-3">
        <input class="form-control" type="text" name="name_lastname" placeholder="ชื่อ-สกุล" required>
    </div>
    <div class="col-md-6 mb-3">
        <input class="form-control" type="text" name="license" placeholder="เลขบัตรประจำตัวประชาชน" required>
    </div>
    <div class="col-md-6 mb-3">
        <input class="form-control" type="date" name="date" placeholder="วัน/เดือน/ปีเกิด" required>
    </div>
    <div class="col-md-6 mb-3">
        <select class="form-control" name="gender" required>
            <option value="">เพศ</option>
            <option value="ชาย">ชาย</option>
            <option value="หญิง">หญิง</option>
            <option value="อื่น ๆ">อื่น ๆ</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <input class="form-control" type="number" name="age" placeholder="อายุ" required>
    </div>
    <div class="col-md-4 mb-3">
        <input class="form-control" type="text" name="weight" placeholder="น้ำหนัก (kg)" required>
    </div>
    <div class="col-md-4 mb-3">
        <input class="form-control" type="text" name="height" placeholder="ส่วนสูง (cm)" required>
    </div>
    <div class="col-md-6 mb-3">
        <input class="form-control" type="text" name="allergy" placeholder="ประวัติแพ้ยา" required>
    </div>
    <div class="col-md-6 mb-3">
        <input class="form-control" type="text" name="chronic_disease" placeholder="โรคประจำตัว">
    </div>
    <div class="col-md-12 mb-3">
        <textarea class="form-control" name="address" placeholder="ที่อยู่" rows="2" required></textarea>
    </div>
    <div class="col-md-12 mb-3">
        <input class= -->"form-control" type="email" name="email" placeholder="อีเมล" required>
    </div>




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