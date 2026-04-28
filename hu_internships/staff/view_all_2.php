<?php
session_start();
//ตรวจสอบ username  ผ่านการ loginหรือยัง 
if (empty($_SESSION['username'])) {
    // Redirect to page login 
    header("Location: ../index.html");
    exit();
}

include '../includes/db_connect.php';
// ดึงข้อมูลทั้งหมดจากตาราง internship_requests เรียงจากใหม่ไปเก่า
$sql = "SELECT * FROM internship_requests ORDER BY request_date DESC";
$result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการคำร้องขอฝึกงาน - Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container-fluid mt-5 px-4">
        <h3 class="mb-4"> จัดการคำร้องขอฝึกงาน (  <?php echo "{$_SESSION["userid"]}"; ?>)</h3>
        <div class="text-start">
        <a href="../menudisplay.php" class="btn btn-outline-secondary">กลับไปหน้าเมนู</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered align-middle text-center" >
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>รหัสนิสิต</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>อาจารย์ที่ปรึกษา</th>
                            <th>บริษัทที่ขอฝึก</th>
                            <th>ตำแหน่ง</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                            <th>บันทึกผล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // จัดการป้ายสีสถานะ
                                $status_html = "";
                                switch ($row['status']) {
                                    case 1:
                                        $status_html = "<span class='badge bg-info text-dark'>1: รับเรื่อง</span>";
                                        break;
                                    case 2:
                                        $status_html = "<span class='badge bg-primary'>2: อ.อนุมัติ</span>";
                                        break;
                                    case 3:
                                        $status_html = "<span class='badge bg-warning text-dark'>3: ออกใบส่งตัว</span>";
                                        break;
                                    case 4:
                                        $status_html = "<span class='badge bg-success'>4: เสร็จสิ้น</span>";
                                        break;
                                    case 9:
                                        $status_html = "<span class='badge bg-danger'>9: ยกเลิก</span>";
                                        break;
                                    default:
                                        $status_html = "<span class='badge bg-secondary'>ไม่ทราบสถานะ</span>";
                                }
echo "<tr>
<td>{$row['intern_id']}</td>
<td>{$row['student_id']}</td>
<td class='text-start'>{$row['firstName']} {$row['lastName']}</td>
<td>{$row['advisor_name']}</td>
<td class='text-start'>{$row['company_name']}</td>
<td>{$row['position']}</td>
<td>{$status_html}</td>
<td>
<a href='update_status.php?id={$row['intern_id']}' class='btn btn-sm btn-primary'>ตรวจสอบ</a>
</td>
<td>
<a href='../teacher/update_teacher.php?id={$row['intern_id']}' class='btn btn-sm btn-record'>
บันทึกผลการนิเทศน์
</a>
</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>ยังไม่มีข้อมูลคำร้อง</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <script src="./js/bootstrap.bundle.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    
</body>

</html>
<?php $connect->close(); ?>
<!-- มีแก้ตรงแอดมิน ไม่ต้องขึ้นบันทึกผล ให้ใส่แค่อาจารย์ -->