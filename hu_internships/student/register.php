<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Internship Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #f5f5f5, #e9ecef);
    font-family: 'Segoe UI', sans-serif;
    animation: fadeIn 0.6s ease-in-out;
}

/* animation */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Card */
.card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-4px);
}

/* Header */
.form-header {
    background: linear-gradient(90deg, #c82333, #dc3545);
    color: white;
    border-radius: 16px 16px 0 0;
    padding: 20px;
}

/* Section */
.section-title {
    font-weight: 600;
    margin-top: 25px;
    margin-bottom: 10px;
    color: #444;
    position: relative;
    padding-left: 12px;
}

.section-title::before {
    content: "";
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 18px;
    background: #dc3545;
    border-radius: 2px;
}

/* Input */
.form-control {
    border-radius: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    background: #fafafa;
    transition: 0.2s;
}

.form-control:hover {
    border-color: #bbb;
}

.form-control:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220,53,69,0.15);
}

/* Button */
.btn-modern {
    background: linear-gradient(90deg, #c82333, #dc3545);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 10px 30px;
    transition: 0.3s;
    font-weight: 500;
}

.btn-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220,53,69,0.3);
}

.btn-modern:active {
    transform: scale(0.97);
}

/* link */
.back-link {
    transition: 0.2s;
}

.back-link:hover {
    color: #dc3545 !important;
}

/* responsive */
@media (max-width: 768px) {
    .card-body {
        padding: 20px !important;
    }
}
</style>
</head>

<body>

<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    $status = 1;

    $sql = "INSERT INTO internship_requests (
        student_id, firstName, lastName, advisor_name,
        company_name, company_address, contact_name,
        contact_phone, position, start_date, end_date, status
    ) VALUES (
        '$student_id', '$firstName', '$lastName', '$advisor_name',
        '$company_name', '$company_address', '$contact_name',
        '$contact_phone', '$position', '$start_date', '$end_date', '$status'
    )";

    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location='register.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด');</script>";
    }
}
?>

<div class="container py-5">
    <div class="col-lg-8 mx-auto">

        <div class="card">

            <div class="form-header text-center">
                <h4 class="mb-0"> แบบฟอร์มขอฝึกงาน</h4>
            </div>

            <div class="card-body p-4">

                <form method="POST">

                    <div class="section-title">ข้อมูลนิสิต</div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="student_id" class="form-control" placeholder="รหัสนิสิต" required>
                        </div>

                        <div class="col-md-4">
                            <input type="text" name="firstName" class="form-control" placeholder="ชื่อ" required>
                        </div>

                        <div class="col-md-4">
                            <input type="text" name="lastName" class="form-control" placeholder="นามสกุล" required>
                        </div>

                        <div class="col-12">
                            <input type="text" name="advisor_name" class="form-control" placeholder="อาจารย์ที่ปรึกษา" required>
                        </div>
                    </div>

                    <div class="section-title">ข้อมูลสถานที่ฝึกงาน</div>

                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" name="company_name" class="form-control" placeholder="ชื่อบริษัท" required>
                        </div>

                        <div class="col-12">
                            <textarea name="company_address" class="form-control" placeholder="ที่อยู่บริษัท" rows="2" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="contact_name" class="form-control" placeholder="ผู้ติดต่อ" required>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="contact_phone" class="form-control" placeholder="เบอร์โทร" required>
                        </div>

                        <div class="col-12">
                            <input type="text" name="position" class="form-control" placeholder="ตำแหน่งที่สมัคร" required>
                        </div>

                        <div class="col-md-6">
                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-modern"> ส่งคำขอ</button>
                    </div>

                </form>

                <div class="mt-3">
                    <a href="../menudisplay.php" class="text-decoration-none text-muted back-link">
                        ← กลับหน้าเมนู
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>