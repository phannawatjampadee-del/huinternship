<?php
session_start();
include '../includes/db_connect.php';
// 1. จัดการเมื่อสตาฟกดปุ่ม "บันทึก"
if (isset($_POST['update_btn'])) {
    $intern_id = $_POST['intern_id'];
    $status = $_POST['status'];
     echo "".$status."";
    $remark = $connect->real_escape_string($_POST['remark']); // ป้องกันอักขระพิเศษพัง SQL
    $sql_update = "UPDATE internship_requests SET status = '$status', remark = '$remark' WHERE intern_id = '$intern_id'";
    if ($connect->query($sql_update) === TRUE) {
        echo "<script>alert('อัปเดตสถานะและหมายเหตุเรียบร้อยแล้ว!'); window.location.href = 'view_all.php';</script>";
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
    header("Location: view_all.php");
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
                        <h6 class="text-danger fw-bold border-bottom pb-2">จัดการสถานะ (สำหรับ <?php echo "{$_SESSION["userid"]}"; ?>)</h6>
                        <form action="update_status.php" method="POST">
                            <input type="hidden" name="intern_id" value="<?php echo $row['intern_id']; ?>">
                            <div class="mb-3">
                                <label class="form-label fw-bold">สถานะคำร้อง:</label>
                                <select class="form-select border-danger" name="status" required>
                                    <option value="1" <?php if ($row['status'] == 1) echo 'selected'; ?>>1: รับเรื่องเข้าระบบ</option>
                                <?php
                                   

                                    $disbutton = "disabled";
                                    $disbutton2 = "disabled";
                                    if ( $_SESSION["userid"] == "teacher") {
                                        $disbutton = "";
                                    }else{ $disbutton2 = "";

                                    }
                                    
                                    echo "<option value='2'";
                                         if ($row['status'] == 2){
                                            echo 'selected';
                                         }

                                    echo " {$disbutton} >2: อาจารย์ที่ปรึกษาอนุมัติ (สิทธิ์ของอาจารย์)</option>";
                               
                                    ?>
                                    <!-- <option value="2" <?php if ($row['status'] == 2) echo 'selected'; ?> disabled>2: อาจารย์ที่ปรึกษาอนุมัติ (สิทธิ์ของอาจารย์)</option> -->
                                    <option value="3" <?php if ($row['status'] == 3) echo 'selected'; ?> <?= htmlspecialchars($disbutton2) ?> >3: ออกใบส่งตัวแล้ว</option>
                                    <option value="4" <?php if ($row['status'] == 4) echo 'selected'; ?> <?= htmlspecialchars($disbutton2) ?>>4: ฝึกงานเสร็จสิ้น</option>
                                    <option value="9" <?php if ($row['status'] == 9) echo 'selected'; ?> <?= htmlspecialchars($disbutton2) ?>>9: ยกเลิก</option>
                                    
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">หมายเหตุ (Remark):</label>
                                <textarea class="form-control" name="remark" rows="3" placeholder="ระบุหมายเหตุถึงนิสิต เช่น เอกสารไม่ครบ, รอรับใบส่งตัว ฯลฯ"><?php echo $row['remark']; ?></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="view_all.php" class="btn btn-secondary px-4">ย้อนกลับ</a>
                                <button type="submit" name="update_btn" class="btn btn-success px-4"> บันทึกการเปลี่ยนแปลง</button>
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