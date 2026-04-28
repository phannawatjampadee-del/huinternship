<?php
include '../includes/db_connect.php'; // เชื่อมต่อฐานข้อมูล
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์มที่นิสิตกรอกฝึกงาน
    $student_id = mysqli_real_escape_string($connect, $_POST['student_id']);
    $firstName = mysqli_real_escape_string($connect, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connect, $_POST['lastName']);
    $advisor_name = mysqli_real_escape_string($connect, $_POST['advisor_name']);
    $company_name = mysqli_real_escape_string($connect, $_POST['company_name']);
    $company_address = mysqli_real_escape_string($connect, $_POST['company_address']);
    $contact_name = mysqli_real_escape_string($connect, $_POST['contact_name']);
    $contact_phone = mysqli_real_escape_string($connect, $_POST['contact_phone']);
    $position = mysqli_real_escape_string($connect, $_POST['position']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    // สถานะเริ่มต้นคือ 1: รับเรื่องเข้าระบบเสมอ
    $status = 1;
    // เพิ่มข้อมูลลงตาราง db internship_requests
    $sql = "INSERT INTO internship_requests (
               student_id, firstName, lastName, advisor_name,
               company_name, company_address, contact_name,
               contact_phone, position, start_date, end_date, status
           ) VALUES (
               '$student_id', '$firstName', '$lastName', '$advisor_name',
               '$company_name', '$company_address', '$contact_name',
               '$contact_phone', '$position', '$start_date', '$end_date', '$status'
           )";
    // เช็คว่าบันทึกสำเร็จมั้ย
    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('บันทึกข้อมูลขอฝึกงานสำเร็จ (สถานะ:รับเรื่องเข้าระบบ)'); window.location='register.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . mysqli_error($connect) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>บันทึกข้อมูลขอฝึกงาน - HU Internships</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0">แบบฟอร์มขอฝึกงาน (Student Internship Request)</h5>
            </div>
            <div class="card-body p-4">
                <form action="" method="POST">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">รหัสนิสิต</label>
                            <input type="text" name="student_id" class="form-control" placeholder="เช่น 6701234567" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">ชื่อ (First Name)</label>
                            <input type="text" name="firstName" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">นามสกุล (Last Name)</label>
                            <input type="text" name="lastName" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">อาจารย์ที่ปรึกษา</label>
                            <input type="text" name="advisor_name" class="form-control" required>
                        </div>
                        <hr class="my-4">
                        <div class="col-12">
                            <label class="form-label">ชื่อบริษัท/หน่วยงาน</label>
                            <input type="text" name="company_name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">ที่อยู่บริษัท</label>
                            <textarea name="company_address" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ชื่อผู้ติดต่อ/HR</label>
                            <input type="text" name="contact_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">เบอร์โทรศัพท์ผู้ติดต่อ</label>
                            <input type="text" name="contact_phone" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">ตำแหน่งที่ขอฝึกงาน</label>
                            <input type="text" name="position" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">วันที่เริ่มฝึกงาน</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">วันที่สิ้นสุดฝึกงาน</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-success px-5">ส่งข้อมูลขอฝึกงาน</button>
                        </div>
                    </div>
                </form>
                <div class="text-start">
                <a href="../menudisplay.php" class="btn btn-outline-secondary">กลับไปหน้าเมนู</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



