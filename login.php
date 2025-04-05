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
            <a class="navbar-brand" href="index.php"><img src="img/fine.svg" alt="..." width="160" height="1600" /></a>
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