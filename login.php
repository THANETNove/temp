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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style type="text/css">
    * {
        box-sizing: border-box;
        font-family: 'Prompt', sans-serif;
    }

    body {
        margin: 0;
        background-color: rgb(93, 199, 211);
    }

    .masthead {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px 20px 20px;
    }

    .container-form {
        max-width: 960px;
        width: 100%;
        height: 100%;
        display: flex;
        background: #fff;
        border-radius: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 8px;
    }



    .left-image {
        width: 45%;
        height: auto;
        background: url('assets/img/portfolio/login.png') no-repeat center center;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border-bottom-left-radius: 16px;
        border-top-left-radius: 16px;

    }


    .form-section {
        z-index: 2;
        flex: 1 1 45%;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        animation: fadeInRight 1s ease;

    }

    .form-section h2 {
        font-size: 28px;
        font-weight: 700;
        color: #003366;
        margin-bottom: 10px;
        text-align: center;
    }

    .form-section h3 {
        font-size: 18px;
        color: #1ebfc0;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-row {
        display: flex;
        gap: 10px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        font-size: 16px;
        border-radius: 10px;
        border: 1px solid #ccc;
        outline: none;
    }

    .form-control:focus {
        border-color: #1ebfc0;
        box-shadow: 0 0 0 0.1rem rgba(30, 191, 192, 0.25);
    }

    .submit-btn {
        width: 100%;
        padding: 14px;
        background-color: #1ebfc0;
        border: none;
        border-radius: 10px;
        color: #fff;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #17a2b8;
    }



    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .left-image {
            width: 100%;
            height: 300px;
        }

        .form-section {
            width: 100%;
        }
    }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="assets/img/navbar-logo.svg" alt="..." width="160"
                    height="1600" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="regis_patient.php">register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container-form">
            <!-- Left doctor image -->
            <div class="left-image"></div>

            <!-- Form section -->
            <div class="form-section">
                <h2>LOGIN</h2>
                <form action="login_connect.php" method="POST">
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <button class="submit-btn" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <!-- Masthead-->

    <!-- Services-->

    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Advice</h2>
                <h3 class="section-subheading text-muted">choose your problems</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/v.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">โภชนาการและอาหาร</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/b.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">การควบคุมระดับน้ำตาลในเลือด</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/e.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">การออกกำลังกายและการใช้ชีวิตประจำวัน</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/s.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">การใช้ยาและการรักษา</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/u.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">โรคแทรกซ้อนและการป้องกัน</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/n.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">ผลกระทบต่อชีวิตส่วนตัวและครอบครัว</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Food</h2>
                <h3 class="section-subheading text-muted">Recommended food menu for diabetics</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/k.jpg"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>ข้าวต้มกุ้ง</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">ควรใช้ข้าวกล้องหรือข้าวไรซ์เบอร์รี
                                แทนข้าวขาวเพื่อลดการเพิ่มของน้ำตาลในเลือด หลีกเลี่ยงการใช้ซุปก้อนหรือผงปรุงรส
                                สามารถใส่ผักเพิ่มใยอาหารได้ กินข้าวต้มในปริมาณที่พอดี ไม่ใส่ข้าวมากเกินไป </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/m.jpg"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>แกงส้มปลากะพงผักรวม</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">แกงส้มปลากะพงผักรวมเป็นอาหารที่ดีต่อผู้ป่วยเบาหวาน แต่ควรปรับลดน้ำตาล
                                เลือกผักที่มีใยอาหารสูง และควบคุมปริมาณข้าวที่กินร่วมกัน
                                เพื่อช่วยควบคุมระดับน้ำตาลในเลือดได้อย่างมีประสิทธิภาพ</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img src="assets/img/about/p.jpg" alt="..." height="170"
                            class="rounded-circle img-fluid" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>ลาบเห็ด</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">ลาบเห็ดเป็นเมนูที่ดีสำหรับผู้ป่วยเบาหวาน เพราะช่วยควบคุมน้ำตาลและไขมัน
                                แต่ควรเลือกเห็ดที่มีใยอาหารสูง ลดเครื่องปรุงที่มีโซเดียม
                                และหลีกเลี่ยงน้ำตาลเพื่อให้ดีต่อสุขภาพมากขึ้น</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/s.jpg"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>สลัดผัก</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">สลัดผักเป็นอาหารที่ดีต่อผู้ป่วยเบาหวาน แต่ต้องเลือกผักที่มีใยอาหารสูง
                                เพิ่มโปรตีนที่ดี และใช้น้ำสลัดที่มีไขมันดีและน้ำตาลต่ำ
                                เพื่อให้สุขภาพดีและควบคุมระดับน้ำตาลในเลือดได้อย่างมีประสิทธิภาพ</p>
                        </div>
                    </div>
                </li>
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
    <!-- Contact-->


    <!-- Footer-->
    <footer class="footer py-4"></footer>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">โภชนาการและอาหาร</h2>
                                <p class="item-intro text-muted">ลองบอกปัญหาของคุณ เช่น คุณสามารถกินอะไรได้บ้าง
                                    และควรหลีกเลี่ยงอะไร?</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/v.jpg" alt="..." />
                                <p>
                                    <input class="form-control" id="text" type="text" placeholder="ปัญหา..."
                                        data-sb-validations="required," />
                                </p>
                                <p>โปรดรอการตอบกลับจากแพทย์ผู้เชี่ยวชาญผ่านทางอีเมลของคุณ</p>
                                <ul class="list-inline">

                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
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
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">การควบคุมระดับน้ำตาลในเลือด</h2>
                                <p class="item-intro text-muted">ลองบอกปัญหาของคุณ เช่น
                                    ค่าระดับน้ำตาลที่เหมาะสมควรอยู่ที่เท่าไหร่?</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/b.jpg" alt="..." />
                                <p>
                                    <input class="form-control" id="text" type="text" placeholder="ปัญหา..."
                                        data-sb-validations="required," />
                                </p>
                                <p>โปรดรอการตอบกลับจากแพทย์ผู้เชี่ยวชาญผ่านทางอีเมลของคุณ</p>
                                <ul class="list-inline">

                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
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
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">การออกกำลังกายและการใช้ชีวิตประจำวัน</h2>
                                <p class="item-intro text-muted">ลองบอกปัญหาของคุณ เช่น
                                    คุณสามารถเดินทางไกลหรือขึ้นเครื่องบินได้ไหม?</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/e.jpg" alt="..." />
                                <input class="form-control" id="text" type="text" placeholder="ปัญหา..."
                                    data-sb-validations="required," />
                                </p>
                                <p>โปรดรอการตอบกลับจากแพทย์ผู้เชี่ยวชาญผ่านทางอีเมลของคุณ</p>
                                <ul class="list-inline">

                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
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
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">การใช้ยาและการรักษา</h2>
                                <p class="item-intro text-muted">ลองบอกปัญหาของคุณ เช่น ถ้าลืมกินยาหรือฉีดอินซูลิน
                                    ควรทำอย่างไร?</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/s.jpg" alt="..." />
                                <input class="form-control" id="text" type="text" placeholder="ปัญหา..."
                                    data-sb-validations="required," />
                                </p>
                                <p>โปรดรอการตอบกลับจากแพทย์ผู้เชี่ยวชาญผ่านทางอีเมลของคุณ</p>
                                <ul class="list-inline">

                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
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
    <!-- Portfolio item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">โรคแทรกซ้อนและการป้องกัน</h2>
                                <p class="item-intro text-muted">ลองบอกปัญหาของคุณ เช่น
                                    เบาหวานสามารถทำให้ตาบอดหรือไตวายได้จริงหรือไม่?</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/u.jpg" alt="..." />
                                <input class="form-control" id="text" type="text" placeholder="ปัญหา..."
                                    data-sb-validations="required," />
                                </p>
                                <p>โปรดรอการตอบกลับจากแพทย์ผู้เชี่ยวชาญผ่านทางอีเมลของคุณ</p>
                                <ul class="list-inline">

                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
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
    <!-- Portfolio item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">ผลกระทบต่อชีวิตส่วนตัวและครอบครัว</h2>
                                <p class="item-intro text-muted">ลองบอกปัญหาของคุณ เช่น
                                    เบาหวานมีผลต่อสมรรถภาพทางเพศหรือไม่?</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/n.jpg" alt="..." />
                                <input class="form-control" id="text" type="text" placeholder="ปัญหา..."
                                    data-sb-validations="required," />
                                </p>
                                <p>โปรดรอการตอบกลับจากแพทย์ผู้เชี่ยวชาญผ่านทางอีเมลของคุณ</p>
                                <ul class="list-inline">

                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
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