<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="img/fine.svg" alt="..." width="160" height="1600" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i></button>
        <!--  <?php session_start(); ?> -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'index_admin.php') ? 'active' : ''; ?>"
                        href="index_admin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'advice.php') ? 'active' : ''; ?>"
                        href="advice.php">Advice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'add_food.php') ? 'active' : ''; ?>"
                        href="add_food.php">Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'patient.php') ? 'active' : ''; ?>"
                        href="patient.php">Patient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'doctor.php') ? 'active' : ''; ?>"
                        href="doctor.php">Doctor</a>
                </li>

                <?php if (!isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'login.php') ? 'active' : ''; ?>"
                        href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'regis_patient.php') ? 'active' : ''; ?>"
                        href="regis_patient.php">Register</a>
                </li>
                <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-capitalize <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>"
                        href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome! <?php echo $_SESSION['user_name']; ?>
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