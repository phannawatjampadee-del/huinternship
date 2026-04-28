<?php
session_start();
include '../includes/db_connect.php';

if (empty($_SESSION["userid"])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบก่อนใช้งาน!'); window.location.href='http://localhost/hu_internships/';</script>";
    exit();
}

$student_id = mysqli_real_escape_string($connect, $_SESSION["userid"]);
$sql = "SELECT * FROM internship_requests WHERE student_id = '$student_id' ORDER BY intern_id DESC";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ติดตามสถานะคำร้อง</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: linear-gradient(135deg, #fff5f5, #ffe5e5);
        font-family: 'Segoe UI', sans-serif;
    }
    .main-card {
        border-radius: 20px;
        overflow: hidden;
    }
    .header-red {
        background: linear-gradient(90deg, #c40000, #ff4d4d);
        color: white;
    }
    .status-card {
        border-radius: 15px;
        transition: 0.3s;
    }
    .status-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .badge {
        padding: 10px 14px;
        border-radius: 12px;
    }
    .btn-back {
        border-radius: 10px;
    }
</style>
</head>

<body>
<div class="container py-5">

    <div class="card shadow main-card">
        <div class="card-header header-red py-3">
            <h5 class="mb-0">
                📌 ติดตามสถานะคำร้องขอฝึกงาน
                <span class="fs-6 d-block mt-1">รหัสนิสิต: <?php echo $_SESSION["userid"]; ?></span>
            </h5>
        </div>

        <div class="card-body p-4">

        <?php if ($result && mysqli_num_rows($result) > 0): ?>

            <h6 class="fw-bold mb-4 text-danger">📋 รายการคำร้องของคุณ</h6>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>

                <div class="card status-card mb-3 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">

                            <div class="col-md-8">
                                <h6 class="fw-bold text-danger mb-2">
                                    <?php echo $row['company_name']; ?>
                                </h6>
                                <p class="mb-1"><strong>ตำแหน่ง:</strong> <?php echo $row['position']; ?></p>
                            </div>

                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <div class="mb-2 text-muted">สถานะ</div>

                                <?php
                                if ($row['status'] == 1) echo '<span class="badge bg-secondary">รับเรื่องเข้าระบบ</span>';
                                elseif ($row['status'] == 2) echo '<span class="badge bg-primary">อาจารย์อนุมัติ</span>';
                                elseif ($row['status'] == 3) echo '<span class="badge bg-info text-dark">ออกใบส่งตัวแล้ว</span>';
                                elseif ($row['status'] == 4) echo '<span class="badge bg-success">เสร็จสิ้น</span>';
                                elseif ($row['status'] == 9) echo '<span class="badge bg-danger">ยกเลิก</span>';
                                else echo '<span class="badge bg-dark">ไม่ทราบสถานะ</span>';
                                ?>

                                <?php if (!empty($row['remark'])): ?>
                                    <div class="alert alert-warning mt-3 p-2 small text-start">
                                        <strong>หมายเหตุ:</strong> <?php echo $row['remark']; ?>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

        <?php else: ?>

            <div class="alert alert-warning text-center">
                ❗ ยังไม่มีประวัติการยื่นคำร้อง
            </div>

        <?php endif; ?>

        </div>
    </div>

    <div class="mt-4">
        <a href="../menudisplay.php" class="btn btn-outline-danger btn-back">
            ← กลับไปหน้าเมนู
        </a>
    </div>

</div>
</body>
</html>