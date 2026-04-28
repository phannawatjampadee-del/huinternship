<?php
session_start(); // เริ่มใช้งาน session เพื่อดึงค่าคนที่ล็อกอิน
include '../includes/db_connect.php'; // เชื่อมต่อฐานข้อมูล

// 1. เช็คก่อนว่าล็อกอินเข้ามาหรือยัง ถ้ายังให้เด้งกลับไปหน้าล็อกอิน
if (empty($_SESSION["userid"])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบก่อนใช้งาน!'); window.location.href='http://localhost/hu_internships/';</script>";
    exit();
}

// 2. เอารหัสนิสิตจาก Session มาใช้
$student_id = mysqli_real_escape_string($connect, $_SESSION["userid"]);

// 3. ดึงข้อมูลคำร้องของนิสิตคนนี้ขึ้นมาอัตโนมัติ (เรียงจากล่าสุดไปเก่า)
$sql = "SELECT * FROM internship_requests WHERE student_id = '$student_id' ORDER BY intern_id DESC";
$result = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ติดตามสถานะคำร้อง - HU Internships</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-info text-dark py-3">
                <h5 class="mb-0">ติดตามสถานะคำร้องขอฝึกงาน (รหัสนิสิต: <?php echo $_SESSION["userid"]; ?>)</h5>
            </div>
            <div class="card-body p-4">
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <h6 class="fw-bold mb-3">รายการคำร้องของคุณ:</h6>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="card border-primary mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="mb-1"><strong>บริษัท/หน่วยงาน:</strong> <?php echo $row['company_name']; ?></p>
                                        <p class="mb-1"><strong>ตำแหน่ง:</strong> <?php echo $row['position']; ?></p>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        <h6 class="mb-2">สถานะปัจจุบัน:</h6>
                                        <?php

                                        if ($row['status'] == 1) echo '<span class="badge bg-secondary fs-6">1: รับเรื่องเข้าระบบ</span>';

                                        elseif ($row['status'] == 2) echo '<span class="badge bg-primary fs-6">2: อาจารย์ที่ปรึกษาอนุมัติ</span>';

                                        elseif ($row['status'] == 3) echo '<span class="badge bg-info text-dark fs-6">3: ออกใบส่งตัวแล้ว</span>';

                                        elseif ($row['status'] == 4) echo '<span class="badge bg-success fs-6">4: ฝึกงานเสร็จสิ้น</span>';

                                        elseif ($row['status'] == 9) echo '<span class="badge bg-danger fs-6">9: ยกเลิก</span>';

                                        else echo '<span class="badge bg-dark fs-6">ไม่ทราบสถานะ</span>';

                                        ?>
                                        <?php if (!empty($row['remark'])): ?>
                                            <div class="alert alert-warning mt-2 p-2 text-start text-dark" style="font-size: 0.85rem;">
                                                <strong>หมายเหตุจากเจ้าหน้าที่:</strong> <?php echo $row['remark']; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="alert alert-warning text-center">

                        ยังไม่มีประวัติการยื่นคำร้องขอฝึกงานในระบบ
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="text-start">
            <a href="../menudisplay.php" class="btn btn-outline-secondary">กลับไปหน้าเมนู</a>
        </div>
    </div>
</body>

</html>