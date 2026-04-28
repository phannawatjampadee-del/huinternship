<?php
session_start();
// ตรวจสอบ username ผ่านการ login หรือยัง
if (empty($_SESSION['username'])) {
    header("Location: ../index.html");
    exit();
}

include '../includes/db_connect.php';

$user_role = $_SESSION['userlevel']; 

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
    <style>
        /* ... CSS เดิมของคุณ (คงไว้ตามเดิม) ... */
        body { background: linear-gradient(135deg, #f1f1f1, #e4e4e7); font-family: "Segoe UI", Tahoma, sans-serif; }
        h3 { font-weight: 700; color: #1f2937; }
        .btn-outline-secondary { border-radius: 10px; font-weight: 600; transition: 0.25s; }
        .btn-outline-secondary:hover { background: #dc2626; color: #fff; border-color: #dc2626; }
        .card { border-radius: 16px; border: none; overflow: hidden; transition: 0.3s; }
        .card:hover { box-shadow: 0 15px 40px rgba(227, 16, 16, 0.96); }
        .my-header { background-color: #bc1212; color: white; }
        .my-header th { background-color: #c01919 !important; color: white !important; }
        .table-hover tbody tr:hover { background-color: #fef2f2; transition: 0.2s; }
        td, th { vertical-align: middle !important; }
        .btn-primary { background: linear-gradient(135deg, #dc2626, #b91c1c); border: none; border-radius: 8px; font-weight: 600; transition: 0.25s; }
        .btn-success { border-radius: 8px; font-weight: 600; }
        .badge { font-size: 13px; padding: 6px 10px; border-radius: 8px; }
        /* สีสถานะคงเดิม... */
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid mt-5 px-4">
        <h3 class="mb-4"> จัดการคำร้องขอฝึกงาน (<?php echo "{$_SESSION["userid"]}"; ?>)</h3>

        <div class="text-start mb-3">
            <a href="../menudisplay.php" class="btn btn-outline-secondary">กลับไปหน้าเมนู</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="my-header">
                        <tr>
                            <th>ID</th>
                            <th>รหัสนิสิต</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>อาจารย์ที่ปรึกษา</th>
                            <th>บริษัทที่ขอฝึก</th>
                            <th>ตำแหน่ง</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                            <?php if ($user_role == 'teacher'): // แสดงหัวข้อเฉพาะอาจารย์ ?>
                                <th>บันทึกผล</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // จัดการป้ายสีสถานะ (Switch Case เดิมของคุณ)
                                $status_html = "";
                                switch ($row['status']) {
                                    case 1: $status_html = "<span class='badge bg-info text-dark'>1: รับเรื่อง</span>"; break;
                                    case 2: $status_html = "<span class='badge bg-primary'>2: อ.อนุมัติ</span>"; break;
                                    case 3: $status_html = "<span class='badge bg-warning text-dark'>3: ออกใบส่งตัว</span>"; break;
                                    case 4: $status_html = "<span class='badge bg-success'>4: เสร็จสิ้น</span>"; break;
                                    case 9: $status_html = "<span class='badge bg-danger'>9: ยกเลิก</span>"; break;
                                    default: $status_html = "<span class='badge bg-secondary'>ไม่ทราบสถานะ</span>";
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
                                    </td>";

                                // ตรวจสอบสิทธิ์: ถ้าเป็นอาจารย์ให้แสดงปุ่มบันทึกผล
                                if ($user_role == 'teacher') {
                                    echo "<td>
                                        <a href='../teacher/update_teacher.php?id={$row['intern_id']}' class='btn btn-sm btn-success'>บันทึกผลการนิเทศ</a>
                                    </td>";
                                }

                                echo "</tr>";
                            }
                        } else {
                            // ปรับ colspan ให้ยืดหยุ่นตามสิทธิ์
                            $col_span = ($user_role == 'teacher') ? 9 : 8;
                            echo "<tr><td colspan='$col_span' class='text-center'>ยังไม่มีข้อมูลคำร้อง</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $connect->close(); ?>