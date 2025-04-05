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

        .food-section {
            width: 100%;
            display: flex;
            padding: 3rem;
            justify-content: center;
        }

        table.shsovp {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            font-family: 'Sarabun', sans-serif;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table.shsovp th,
        table.shsovp td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
    </style>

    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php include('navber_admin.php'); ?>

    <!-- Contact-->
    <section class="page-section" id="contact">




        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Menu</h2>

            </div>


            <div class="form-section">

                <form action="insert_food.php" method="POST" enctype="multipart/form-data">
                    <?php if (isset($_GET['success'])): ?>
                        <?php if ($_GET['success'] == 1): ?>
                            <div
                                style="padding:10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 10px;">
                                ✅ บันทึกข้อมูลเรียบร้อยแล้ว
                            </div>
                        <?php elseif ($_GET['success'] == 2): ?>
                            <div
                                style="padding:10px; background-color: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; margin-bottom: 10px;">
                                ✏️ แก้ไขข้อมูลเรียบร้อยแล้ว
                            </div>
                        <?php elseif ($_GET['success'] == 3): ?>
                            <div class="alert alert-danger">🗑️ ลบข้อมูลและรูปภาพเรียบร้อยแล้ว</div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <h3 class="mb-4">เมนูอาหาร</h3>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="text" name="name" placeholder="ชื่อเมนู" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="form-control" name="details" placeholder="รายละเอียด" rows="2"
                                required></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="file" name="image" placeholder="ภาพ" accept="image/*"
                                required>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">บันทึก</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </section>
    <section class="food-section" id="contact">
        <?php
        require 'connect_db.php';

        $sql = "SELECT * FROM food";
        $result = mysqli_query($conn, $sql);
        $index = 1; // เริ่มลำดับที่ 1

        ?>

        <table class="shsovp">
            <tr>
                <th>ID</th>
                <th>ชื่อเมนู</th>
                <th>รายละเอียด</th>
                <th>รูปภาพ</th>
                <th>แก้ไข</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['details'] ?></td>
                    <td><img src="assets/img/uploads/food/<?= $row['image'] ?>" width="150"></td>
                    <td>
                        <div class="action-buttons">
                            <a href="food_edit.php?id=<?= $row['id'] ?>" class="btn btn-primary mb-2 w-100">แก้ไข</a>
                            <a href="delete_food.php?id=<?= $row['id'] ?>" class="btn btn-danger w-100"
                                onclick="return confirm('⚠️ คุณแน่ใจหรือไม่ว่าต้องการลบรายการนี้?')">ลบ</a>
                        </div>

                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <?php mysqli_close($conn); ?>

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