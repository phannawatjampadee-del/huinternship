<?php
session_start();
//ตรวจสอบ username  ผ่านการ loginหรือยัง 
if (empty($_SESSION['username'])) {
    // Redirect to page login 
    header("Location: ../index.html");
    exit();
}
// เชื่อมต่อ db_connect
include '../includes/db_connect.php';
// 1. จัดการเมื่อสตาฟกดปุ่ม "บันทึก"
if (isset($_POST['update_btn'])) {
    $intern_id = $_POST['intern_id'];
    //$status = $_POST['status'];
    $remark = $connect->real_escape_string($_POST['remark']); // ป้องกันอักขระพิเศษพัง SQL
    $sql_update = "UPDATE internship_requests SET comment_teacher = '$remark' WHERE intern_id = '$intern_id'";
    if ($connect->query($sql_update) === TRUE) {
        echo "<script>alert('บันทึกผลการนิเทศน์สหกิจศึกษาเรียบร้อยแล้ว!'); window.location.href = '../staff/view_all.php';</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $connect->error . "');</script>";
    }
}
// 2. ดึงข้อมูลมาโชว์ในฟอร์มเมื่อเข้ามาหน้านี้
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_select = "SELECT * FROM internship_requests WHERE intern_id = '$id'";
    $result = $connect->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("ไม่พบข้อมูลคำร้อง ID นี้");
    }
} else {
    header("Location: ../staff/view_all.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปเดตสถานะ -  <?php echo "{$_SESSION["userid"]}"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ ใส่ CSS เพื่อนตรงนี้ (ไม่ยุ่งกับโค้ดคุณเลย) -->
    <style>
     body {
        font-family: 'Sarabun', sans-serif;
        background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
        color: #1f2937;
    }

    .card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08) !important;
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 25px 60px rgba(0,0,0,0.12);
    }

    .card-header {
        background: linear-gradient(135deg, #f01818, #373131) !important;
        border-bottom: 3px solid #d3c5c8 !important;
        padding: 1.3rem;
    }

    .card-header h5 {
        font-weight: 600;
        letter-spacing: 0.6px;
        color: #fff;
    }

    h6.text-primary {
        color: #720707 !important;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1.2px;
        margin-top: 1.8rem;
        margin-bottom: 0.8rem;
    }

    h6.text-danger {
        color: #070912 !important;
        background: #fef2f2;
        padding: 10px 12px;
        border-radius: 10px;
        border-left: 4px solid #dc2626;
    }

    .fw-bold.text-end {
        color: #0f0f14;
        font-weight: 600 !important;
        font-size: 0.9rem;
    }

    .form-select, .form-control {
        border-radius: 10px;
        border: 1px solid #19026c;
        padding: 10px 14px;
        transition: all 0.25s ease;
        background-color: #fff;
    }

    .form-select:hover, .form-control:hover {
        border-color: #9e1b32;
    }

    .form-select:focus, .form-control:focus {
        border-color: #9e1b32;
        box-shadow: 0 0 0 3px rgba(158, 27, 50, 0.15);
    }

    .form-select.border-danger {
        border-color: #2277bc !important;
        background-color: #fff5f5;
    }

    .btn-success {
        background: linear-gradient(135deg, #1960b1, #2587b1);
        border: none;
        border-radius: 10px;
        padding: 10px 26px;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #7a1426, #5c0f1d);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(158, 27, 50, 0.35);
    }

    .btn-secondary {
        background-color: #6b7280;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        transition: 0.25s;
    }

    .btn-secondary:hover {
        background-color: #4b5563;
    }

    .row.mb-2 {
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px dashed #e5e7eb;
        transition: 0.2s;
    }

    .row.mb-2:hover {
        background-color: #fafafa;
        border-radius: 6px;
    }

    .row.mb-2:last-child {
        border-bottom: none;
    }

    .col-sm-8 {
        color: #111827;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .fw-bold.text-end {
            text-align: left !important;
            margin-bottom: 5px;
        }
    }
    </style>

</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"> ตรวจสอบคำร้องขอฝึกงาน (ID: <?php echo $row['intern_id']; ?>)</h5>
                    </div>
                    <div class="card-body p-4">
                        <h6 class="text-primary fw-bold border-bottom pb-2">ข้อมูลผู้ยื่นคำร้อง</h6>
                        <div class="row mb-2">
                            <div class="col-sm-4 fw-bold text-end">รหัสนิสิต:</div>
                            <div class="col-sm-8"><?php echo $row['student_id']; ?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 fw-bold text-end">ชื่อ-นามสกุล:</div>
                            <div class="col-sm-8"><?php echo $row['firstName'] . " " . $row['lastName']; ?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4 fw-bold text-end">อาจารย์ที่ปรึกษา:</div>
                            <div class="col-sm-8"><?php echo $row['advisor_name']; ?></div>
                        </div>
                        <h6 class="text-primary fw-bold border-bottom pb-2">ข้อมูลสถานที่ฝึกงาน</h6>
                        <div class="row mb-2">
                            <div class="col-sm-4 fw-bold text-end">ชื่อบริษัท:</div>
                            <div class="col-sm-8"><?php echo $row['company_name']; ?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 fw-bold text-end">ที่อยู่บริษัท:</div>
                            <div class="col-sm-8"><?php echo $row['company_address']; ?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 fw-bold text-end">ผู้ติดต่อ / เบอร์โทร:</div>
                            <div class="col-sm-8"><?php echo $row['contact_name'] . " / " . $row['contact_phone']; ?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 fw-bold text-end">ตำแหน่งที่ไปฝึก:</div>
                            <div class="col-sm-8"><?php echo $row['position']; ?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4 fw-bold text-end">ระยะเวลาฝึกงาน:</div>
                            <div class="col-sm-8">
                                <?php
                                $start = $row['start_date'] ? date("d/m/Y", strtotime($row['start_date'])) : "-";
                                $end = $row['end_date'] ? date("d/m/Y", strtotime($row['end_date'])) : "-";
                                echo $start . " ถึง " . $end;
                                ?>
                            </div>
                        </div>
                        <form action="update_teacher.php" method="POST">
                            <input type="hidden" name="intern_id" value="<?php echo $row['intern_id']; ?>">
                            <div class="mb-3">
                                <?php
                                ?> 
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">บันทึกผลการนิเทศน์สหกิจศึกษา:</label>
                                <textarea class="form-control" name="remark" rows="3" placeholder="ระบุหมายเหตุถึงนิสิต เช่น เอกสารไม่ครบ, รอรับใบส่งตัว ฯลฯ"><?php echo $row['comment_teacher']; ?></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="../staff/view_all.php" class="btn btn-secondary px-4">ย้อนกลับ</a>
                                <button type="submit" name="update_btn" class="btn btn-success px-4">บันทึกการเปลี่ยนแปลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $connect->close(); ?>