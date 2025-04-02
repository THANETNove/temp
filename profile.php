<?php
// ดึงข้อมูลจากฐานข้อมูลด้วย user_id (เช่นผ่าน SESSION)
require 'connect_db.php';
session_start();

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Profile - Balance4Life</title>
    <link rel="icon" type="image/x-icon" href="img/logoo.png" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f4fbfc;
            font-family: 'Prompt', sans-serif;
        }

        .profile-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
            max-width: 700px;
            margin: 100px auto;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto 20px auto;
            display: block;
            border: 3px solid #1ebfc0;
        }

        .profile-title {
            font-size: 26px;
            font-weight: 700;
            color: #003366;
            text-align: center;
            margin-bottom: 10px;
        }

        .profile-info {
            font-size: 16px;
            color: #333;
            padding-top: 20px;
        }

        .profile-info p {
            margin-bottom: 10px;
        }

        .profile-info strong {
            width: 150px;
            display: inline-block;
            color: #1ebfc0;
        }

        .btn-secondary {
            background-color: #1ebfc0;
            border: none;
            font-weight: bold;
        }

        .btn-secondary:hover {
            background-color: #17a2b8;
        }

        .navbar .nav-username {
            font-weight: 600;
            color: #1ebfc0 !important;
            pointer-events: none;
            cursor: default;
            background-color: rgba(30, 191, 192, 0.1);
            padding: 8px 16px;
            border-radius: 20px;
            transition: background 0.3s;
        }

        .navbar .nav-username:hover {
            background-color: rgba(30, 191, 192, 0.2);
        }
    </style>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand nav-link"
                <?php if ($user['status'] == 1): // แพทย์ 
                ?>
                href="index.php"
                <?php elseif ($user['status'] == 2): // แอดมิน 
                ?>
                href="index_admin.php"
                <?php elseif ($user['status'] == 3): // หมอ 
                ?>
                href="index_doctor.php"
                <?php endif; ?>><img src="assets/img/navbar-logo.svg" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link"
                            <?php if ($user['status'] == 1): // แพทย์ 
                            ?>
                            href="index.php"
                            <?php elseif ($user['status'] == 2): // แอดมิน 
                            ?>
                            href="index_admin.php"
                            <?php elseif ($user['status'] == 3): // หมอ 
                            ?>
                            href="index_doctor.php"
                            <?php endif; ?>>Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="regis_physician.php">Register</a></li>
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

    <section class="page-section" id="contact">
        <div class="container">
            <div class="profile-card">
                <img src="assets/img/portfolio/pa.jpg" alt="Patient" class="profile-img">
                <?php if ($user['status'] == 1): // แพทย์ 
                ?>
                    <div class="profile-title">โปรไฟล์ผู้ป่วย</div>
                <?php elseif ($user['status'] == 2): // แอดมิน 
                ?>
                    <div class="profile-title">โปรไฟล์ Admin</div>
                <?php elseif ($user['status'] == 3): // หมอ 
                ?>
                    <div class="profile-title">โปรไฟล์ Doctor</div>
                <?php endif; ?>
                <div class="profile-info">
                    <p><strong>ชื่อ-นามสกุล:</strong> <?php echo $user['name_lastname']; ?></p>
                    <p><strong>อายุ:</strong> <?php echo $user['age']; ?> ปี</p>
                    <p><strong>เพศ:</strong> <?php echo $user['gender']; ?></p>

                    <?php if ($user['status'] == 1): // แพทย์ 
                    ?>
                        <p><strong>น้ำหนัก:</strong> <?php echo $user['weight']; ?> kg</p>
                        <p><strong>ส่วนสูง:</strong> <?php echo $user['height']; ?> cm</p>
                        <p><strong>ประวัติแพ้ยา:</strong> <?php echo $user['allergy']; ?></p>
                        <p><strong>โรคประจำตัว:</strong> <?php echo $user['chronic_disease']; ?></p>
                    <?php elseif ($user['status'] == 2): // แอดมิน 
                    ?>
                        <p><strong>เบอร์โทร:</strong> <?php echo $user['tel']; ?></p>
                    <?php elseif ($user['status'] == 3): // หมอ 
                    ?>
                        <p><strong>เลขที่ใบประกอบวิชาชีพ:</strong> <?php echo $user['medical']; ?></p>
                    <?php endif; ?>

                    <p><strong>อีเมล:</strong> <?php echo $user['email']; ?></p>
                    <p><strong>ที่อยู่:</strong> <?php echo $user['address']; ?></p>
                </div>
                <?php if ($user['status'] == 1): // แพทย์ 
                ?>
                    <a href="index.php" class="btn btn-secondary mt-4">ย้อนกลับ</a>
                <?php elseif ($user['status'] == 2): // แอดมิน 
                ?>
                    <a href="index_admin.php" class="btn btn-secondary mt-4">ย้อนกลับ</a>
                <?php elseif ($user['status'] == 3): // หมอ 
                ?>
                    <a href="index_doctor.php" class="btn btn-secondary mt-4">ย้อนกลับ</a>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Balance4life 2024</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>