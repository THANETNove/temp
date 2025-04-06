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



    <?php include('navber_doctor.php'); ?>
    <?php

    require 'connect_db.php';

    // ตรวจสอบว่าเข้าสู่ระบบด้วย role แพทย์หรือไม่ (optional)
    // if (!isset($_SESSION['doctor_id'])) { exit("เฉพาะแพทย์เท่านั้น"); }


    $sql = "SELECT 
            ap.*,
            u.name_lastname AS name_lastname
                FROM advice_problems ap
                LEFT JOIN users u ON ap.user_id = u.id
                WHERE ap.answer_text IS NULL
                ORDER BY ap.created_at DESC";


    $resultQ = mysqli_query($conn, $sql);
    ?>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">"Healing is a matter of time"</div>
            <div class="masthead-heading text-uppercase">but it is sometimes also a matter of opportunity</div>


        </div>
    </header>

    <section class="page-section" id="appointment">
        <?php

        require 'connect_db.php';

        // ตรวจสอบการ login
        if (!isset($_SESSION['user_id'])) {
            echo "<div class='alert alert-danger'>กรุณาเข้าสู่ระบบก่อนทำการนัดหมาย</div>";
            exit;
        }

        // โหลดข้อมูลการนัดที่ยังไม่ได้เลือกแพทย์
        $sql = "SELECT 
            ap.*, 
            u.name_lastname AS user_name
                FROM appointments ap
                LEFT JOIN users u ON ap.user_id = u.id
                WHERE  ap.status = 'pending'
                ORDER BY ap.created_at DESC";

        $resultMake = mysqli_query($conn, $sql);

        // โหลดรายชื่อแพทย์

        $i = 1;
        ?>
        <div>

            <div>
                <div class="text-center">
                    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                        <div style="
                            display: inline-block;
                            padding: 10px;
                            background-color: #d4edda;
                            color: #155724;
                            border: 1px solid #c3e6cb;
                            margin-bottom: 16px;
                            border-radius: 5px;
                            font-size: 16px;">
                            ✅ บันทึกข้อมูลเรียบร้อยแล้ว
                        </div>
                    <?php endif; ?>


                    <h2 class="section-heading text-uppercase">รายการพบเเพทย์</h2>
                    <h3 class="section-subheading text-muted">เระบบนัดพบแพทย์ สำหรับการดูแลสุขภาพเฉพาะทาง
                    </h3>

                </div>

                <div class="container mt-5">
                    <h2 class="text-uppercase mb-3">📋 รายการพบเเพทย์</h2>

                    <?php if (mysqli_num_rows($resultMake) > 0): ?>
                        <table class="table table-bordered table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันเวลานัดพบ</th>
                                    <th>รายละเอียด</th>
                                    <th>ผู้ใช้</th>
                                    <th>completed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($resultMake)): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td>
                                            <?= date("d/m/Y", strtotime($row['appointment_date'])) ?>
                                            : <?= htmlspecialchars($row['appointment_time']) ?>
                                        </td>
                                        <td><?= nl2br(htmlspecialchars($row['symptoms'])) ?></td>
                                        <td><?= htmlspecialchars($row['user_name']) ?></td>
                                        <td>
                                            <form action="update_appointment.php" method="POST" class="d-flex">
                                                <input type="hidden" name="appointment_id" value="<?= $row['id'] ?>">
                                                <select name="status" class="form-select me-2" required>
                                                    <option value="">-- เลือกสถานะ --</option>
                                                    <option value="completed">พบแพทย์แล้ว</option>
                                                </select>
                                                <button type="submit" class="btn btn-success btn-sm">ยืนยัน</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="questions">

        <div class="container">
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div style="
                display: inline-block;
                padding: 10px;
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
                margin-bottom: 16px;
                border-radius: 5px;
                font-size: 16px;">
                    ✅ ตอบคำถามเรียบร้อยแล้ว
                </div>
            <?php endif; ?>
            <h2 class="text-uppercase mb-4">📩 คำถามจากผู้ใช้งาน</h2>

            <?php while ($row = mysqli_fetch_assoc($resultQ)): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>ผู้ใช้:</strong> <?= htmlspecialchars($row['name_lastname']) ?> |
                        <strong>วันที่ส่ง:</strong> <?= date("d/m/Y H:i", strtotime($row['created_at'])) ?>
                    </div>
                    <div class="card-body">
                        <p><strong>คำถาม:</strong> <?= nl2br(htmlspecialchars($row['problem_text'])) ?></p>

                        <?php if ($row['answer_text']): ?>
                            <div class="alert alert-success">
                                <strong>คำตอบเดิม:</strong><br><?= nl2br(htmlspecialchars($row['answer_text'])) ?>
                            </div>
                        <?php else: ?>
                            <form action="save_answer.php" method="POST">
                                <div class="mb-3">
                                    <label for="answer_text" class="form-label">พิมพ์คำตอบ:</label>
                                    <textarea name="answer_text" class="form-control" rows="4" required></textarea>
                                </div>
                                <input type="hidden" name="problem_id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn btn-primary">✅ ส่งคำตอบ</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    <!-- Portfolio Grid-->


    <!-- Contact-->



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