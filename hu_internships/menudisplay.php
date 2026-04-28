<?php 
session_start();
// 1. ตรวจสอบ username ผ่านการ login หรือยัง (อิงจากโค้ดหลังบ้านเป็นหลัก)
if (empty($_SESSION['username'])) {
    header("Location: ./index.html");
    exit();
}

// 2. เชื่อมต่อฐานข้อมูล
include './includes/db_connect.php';

// 3. ดึงข้อมูลเมนูตามระดับผู้ใช้ ( DB Muserlevel)
$sql = "SELECT * FROM ismenu WHERE Muserlevel='". $_SESSION["userlevel"]."' ORDER BY Mlevel ASC";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - HU Internships System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(135deg, #f5f5f5, #e9ecef);
            min-height: 100vh;
        }

        /* NAVBAR Customization */
        .navbar {
            background: linear-gradient(135deg, #5a0707, #ff4d4d);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar .nav-link, .navbar-brand {
            color: white !important;
        }
        .navbar .nav-link:hover {
            color: #ffcccc !important;
        }

        /* HERO SECTION */
        .hero {
            background: linear-gradient(135deg, #57093d, #ff4d4d);
            color: white;
            padding: 60px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        /* CARD MODERN */
        .card-modern {
            border: none;
            border-radius: 20px;
            padding: 25px;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            transition: 0.3s;
            height: 100%;
        }
        .card-modern:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        /* BUTTON */
        .btn-main {
            background: linear-gradient(135deg, #b30000, #ff4d4d);
            color: white;
            border-radius: 30px;
            padding: 12px 30px;
            border: none;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
        .btn-main:hover {
            opacity: 0.9;
            color: white;
            box-shadow: 0 5px 15px rgba(179, 0, 0, 0.3);
        }

        /* SECTION TITLE */
        .section-title {
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#home fw-bold">HU Internships System</a> 
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="text-white">☰</span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        
        <?php 
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li class='nav-item'><a class='nav-link' href='".$row['Mlink']."'>" . $row["Mdashboard"]. "</a></li>";
            }
        } else {
            echo "<li class='nav-item'><span class='nav-link text-white-50'>No Menu Available</span></li>";
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div class="hero mb-5" id="home">
        <h2 class="fw-bold">Welcome to Internships System, <?php echo $_SESSION["username"]; ?></h2>
        <p class="lead mb-0">ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลการฝึกงาน</p>
    </div>

    <div id="course" class="pt-4">
        <h3 class="section-title">หลักสูตรของสารสนเทศ</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-modern text-center">
                    <i class="bi bi-laptop fs-1 text-danger"></i>
                    <h5 class="mt-3 fw-bold">การจัดการข้อมูลและสารสนเทศ</h5>
                    <p class="text-muted">สาขาสารสนเทศศึกษามุ่งเน้นการจัดการข้อมูลอย่างเป็นระบบ ตั้งแต่การจัดเก็บ ค้นหา และเข้าถึงข้อมูล โดยใช้เทคโนโลยีเข้ามาช่วย</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern text-center">
                    <i class="bi bi-cpu fs-1 text-danger"></i>
                    <h5 class="mt-3 fw-bold">การพัฒนาทักษะและการวิเคราะห์</h5>
                    <p class="text-muted">ผู้เรียนจะได้พัฒนาทักษะที่สำคัญ เช่น การออกแบบระบบสารสนเทศ การจัดการฐานข้อมูล และการวิเคราะห์ข้อมูลเชิงลึก</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern text-center">
                    <i class="bi bi-briefcase fs-1 text-danger"></i>
                    <h5 class="mt-3 fw-bold">โอกาสในอาชีพที่หลากหลาย</h5>
                    <p class="text-muted">สามารถทำงานในสายอาชีพ เช่น นักวิเคราะห์ข้อมูล นักพัฒนาระบบ หรือผู้ดูแลจัดการข้อมูลในองค์กรชั้นนำ</p>
                </div>
            </div>
        </div>
    </div>

    <div id="news" class="mt-5 pt-4">
        <h3 class="section-title">ข่าวประชาสัมพันธ์</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-modern">
                    <img src="img/S__15941638.jpg" class="img-fluid mb-2" alt="news">
                    <span class="badge bg-danger mb-2">New</span>
                
                    <h6>เปิดรับสมัครทุนการศึกษา "NITORI International Scholarship Foundation"</h6>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern">
                    <img src="img/S__15941639.jpg" class="img-fluid mb-2" alt="news">
                    <span class="badge bg-primary mb-2">Update</span>
                    <h6>คณะมนุษยศาสตร์ เปิดรับสมัครตำแหน่งนักจัดการงานทั่วไป We Are Hiring !!!</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern">
                    <img src="img/S__15941642.jpg" class="img-fluid mb-2" alt="news">
                    <span class="badge bg-success mb-2">Info</span>
                    <h6>ประกาศรับสมัครทุนเรียนรู้ภาษา ณ Stafford House สหราชอาณาจักร</h6>
                </div>
            </div>
        </div>
    </div>

    <div id="students" class="mt-5 pt-4">
        <h3 class="section-title">ข้อมูลนิสิตรายปี</h3>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="card-modern text-center">
                    <h5 class="fw-bold text-danger">ปี 1</h5>
                    <p class="small">ปรับพื้นฐานทั้งด้านการเรียนความรู้เบื้องต้นเกี่ยวกับสารสนเทศ เช่น
                     การใช้เทคโนโลยี การสื่อสาร และแนวคิดพื้นฐานของการจัดการข้อมูล </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern text-center">
                    <h5 class="fw-bold text-danger">ปี 2</h5>
                    <p class="small">เริ่มศึกษาเนื้อหาสาขาสารสนเทศโดยตรง เช่น การจัดการฐานข้อมูล ระบบสารสนเทศ 
                    และการใช้เทคโนโลยีในการจัดเก็บและค้นหาข้อมูล </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern text-center">
                    <h5 class="fw-bold text-danger">ปี 3</h5>
                    <p class="small">การออกแบบและพัฒนาระบบสารสนเทศ 
                    รวมถึงการทำโครงงานและการประยุกต์ใช้ความรู้ในการแก้ปัญหา เตรียมความพร้อมสำหรับการฝึกงาน</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern text-center">
                    <h5 class="fw-bold text-danger">ปี 4</h5>
                    <p class="small">เน้นการนำความรู้ไปใช้ในสถานการณ์จริง ผ่านการฝึกงานหรือโครงการวิจัย
                     เพื่อเตรียมความพร้อมสำหรับการทำงานในอนาคต</p>
                </div>
            </div>
        </div>
    </div>

    <?php 
    if ($_SESSION["username"] === "student" ) {

    echo "<div id='internships' class='text-center mt-5 mb-5 p-5 bg-white rounded-4 shadow-sm'>";
    echo "<h3 class='fw-bold mb-3'>ต้องการยื่นเรื่องฝึกงาน?</h3>";
    echo "<p class='text-muted mb-4'>นิสิตสามารถส่งคำขอฝึกงานผ่านระบบออนไลน์ได้ทันที</p>";
    echo "<a href='./student/register.php' class='btn-main'>";
    echo " <i class='bi bi-file-earmark-text me-2'></i>ยื่นคำขอฝึกงาน </a>";

    // <div id="internships" class="text-center mt-5 mb-5 p-5 bg-white rounded-4 shadow-sm">
    //     <h3 class="fw-bold mb-3">ต้องการยื่นเรื่องฝึกงาน?</h3>
    //     <p class="text-muted mb-4">นิสิตสามารถส่งคำขอฝึกงานผ่านระบบออนไลน์ได้ทันที</p>
    //     <a href="./student/register.php" class="btn-main">
    //         <i class="bi bi-file-earmark-text me-2"></i>ยื่นคำขอฝึกงาน
    //     </a>
    // </div>
   
   }
   ?>
    <p>
    <div class="text-center mb-5">
        <a href="contact.php" class="btn btn-outline-danger px-4 py-2 mt-5" style="border-radius: 50px;">
            <i class="bi bi-telephone me-2"></i>ติดต่อสอบถามเพิ่มเติม
        </a>
    </div>
</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
// ปิดการเชื่อมต่อฐานข้อมูลตอนท้ายไฟล์ (อิงจากโค้ดหลังบ้านหลัก)
if (isset($connect)) {
    $connect->close();
}
?>
</body>
</html>
<!-- เหลือแก้ลิ้งค์ยื่นคำขอฝึกงาน -->