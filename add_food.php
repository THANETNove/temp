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

        .form-control:focus {

            border-color: #43D0C7;
            box-shadow: 0 0 0 0.25rem rgba(67, 208, 199, 0.25);
        }

        .btn-primary {
            background-color: #43D0C7;
            border-color: #43D0C7;
        }

        .btn-primary:hover {
            background-color: #2bb5ac;
            border-color: #2bb5ac;
        }

        .form-section {
            width: 100%;
            display: flex;
            justify-content: center;

            /* ให้มีความสูงเต็มหน้าจอ */
        }

        .page-section form {
            width: 70%;
            max-width: 800px;
            background: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="img/fine.svg" alt="..." width="160" height="1600" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i></button>
            <?php session_start(); ?>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Advice</a></li>
                    <li class="nav-item"><a class="nav-link active" href="add_food.php">Food</a></li>
                    <li class="nav-item"><a class="nav-link" href="patient.php">Patient</a></li>
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

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Menu</h2>

            </div>


            <div class="form-section">
                <form action="insert_food.php" method="POST" enctype="multipart/form-data">
                    <h3 class="mb-4">เมนูอาหาร</h3>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="text" name="name" placeholder="ชื่อเมนู" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="form-control" name="details" placeholder="รายละเอียด" rows="2" required></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="file" name="image" placeholder="ภาพ" accept="image/*" required>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">บันทึก</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </section>

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