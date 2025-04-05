<?php
require 'connect_db.php';
// ป้องกัน session_start() ซ้ำ

// ตรวจสอบว่ามี user_id ใน session หรือไม่
if (isset($_SESSION['user_id'])) {
    // ถ้าไม่มี session ให้กลับไปหน้า login

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = $user_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    if ($user['status'] == '2') {
        header("Location: index_admin.php");
        exit(); // หยุดการทำงานของ script
    } elseif ($user['status'] == '3') {
        header("Location: index_doctor.php");
        exit();
    }
}

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

        .navbar .nav-username {
            font-weight: 600;
            color: #1ebfc0 !important;
            /* สีฟ้าสวย ๆ */
            pointer-events: none;
            /* ไม่ให้คลิก */
            cursor: default;
            background-color: rgba(30, 191, 192, 0.1);
            padding: 8px 16px;
            border-radius: 20px;
            transition: background 0.3s;
        }

        .navbar .nav-username:hover {
            background-color: rgba(30, 191, 192, 0.2);
        }

        header.masthead .masthead-subheading {
            font-size: 2.25rem;
            font-style: italic;
            line-height: 2.25rem;
            margin-bottom: 2rem;
            padding-top: 8rem !important;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php include('navber_patient.php'); ?>


    <!-- Masthead-->

    <!-- Services-->

    <header class="masthead">
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div style="
        display: inline-block;
        padding: 10px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        margin-bottom: 10px;
        border-radius: 5px;
        font-size: 16px;">
                ✅ ส่งข้อมูลเรียบร้อยแล้ว
            </div>
        <?php endif; ?>


        <div class="container">
            <div class="masthead-subheading">"Welcome to our website"</div>
            <div class="masthead-heading text-uppercase">Adviser for diabetics </div>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a class="btn btn-primary btn-xl text-uppercase" href="login.php">Sign in</a>
            <?php endif; ?>


        </div>
    </header>

    <!-- Portfolio Grid-->
    <?php
    require 'connect_db.php';

    $sql = "SELECT * FROM advice ORDER BY id ASC";
    $resultAdvice = mysqli_query($conn, $sql);
    ?>

    <!-- Section: Advice Grid -->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Advice</h2>
                <h3 class="section-subheading text-muted">Choose your problems</h3>
            </div>

            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($resultAdvice)) :
                    $modalId = "portfolioModal" . $row['id'];
                ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#<?= $modalId ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid"
                                    src="assets/img/uploads/advice/<?= htmlspecialchars($row['image']) ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?= htmlspecialchars($row['name']) ?></div>
                                <div class="portfolio-caption-subheading text-muted"></div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Section: Modals -->
    <?php
    // ✅ รีเซ็ต cursor ของ result set ให้ลูปใหม่ได้
    mysqli_data_seek($resultAdvice, 0);

    while ($row = mysqli_fetch_assoc($resultAdvice)) :
        $modalId = "portfolioModal" . $row['id'];
    ?>
        <div class="portfolio-modal modal fade" id="<?= $modalId ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal">
                        <img src="assets/img/close-icon.svg" alt="Close modal" />
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase"><?= htmlspecialchars($row['name']) ?></h2>
                                    <p class="item-intro text-muted"><?= nl2br(htmlspecialchars($row['details'])) ?></p>
                                    <img class="img-fluid d-block mx-auto"
                                        src="assets/img/uploads/advice/<?= htmlspecialchars($row['image']) ?>" alt="..." />
                                    <form action="insert_Advice_problems.php" method="POST">
                                        <input type="hidden" name="advice_id" value="<?= $row['id'] ?>">

                                        <p>
                                            <input class="form-control" name="problem_text" type="text"
                                                placeholder="ปัญหา..." required />
                                        </p>

                                        <p>โปรดรอการตอบกลับจากแพทย์ผู้เชี่ยวชาญผ่านทางอีเมลของคุณ</p>


                                        <?php if (isset($_SESSION['user_id'])): ?>
                                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">
                                                <i class="fas fa-paper-plane me-1"></i> ส่งคำถาม
                                            </button>
                                        <?php else: ?>
                                            <div class="alert alert-warning text-center mt-2">
                                                กรุณาเข้าสู่ระบบก่อนส่งคำถาม
                                            </div>
                                        <?php endif; ?>


                                        <button class="btn btn-secondary btn-xl text-uppercase" data-bs-dismiss="modal"
                                            type="button">
                                            <i class="fas fa-xmark me-1"></i> Close
                                        </button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>


    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Food</h2>
                <h3 class="section-subheading text-muted">Recommended food menu for diabetics</h3>
            </div>

            <ul class="timeline">
                <?php
                require 'connect_db.php';
                $sql = "SELECT * FROM food ORDER BY id ASC";
                $result = mysqli_query($conn, $sql);
                $index = 0;

                while ($row = mysqli_fetch_assoc($result)):
                    $index++;
                    $inverted = ($index % 2 == 0) ? 'timeline-inverted' : '';
                    $imagePath = 'assets/img/uploads/food/' . $row['image'];
                ?>
                    <li class="<?= $inverted ?>">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="<?= $imagePath ?>" alt="<?= $row['name'] ?>"
                                style="height: 170px; object-fit: cover;" />
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?= htmlspecialchars($row['name']) ?></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted"><?= nl2br(htmlspecialchars($row['details'])) ?></p>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>

                <!-- ปิด timeline ด้วย Healthy! -->
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>Healthy!</h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Team-->
    <!-- Clients-->
    <div class="py-5">
        <div class="container"></div>
    </div>


    <!-- Footer-->
    <footer class="footer py-4"></footer>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->

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