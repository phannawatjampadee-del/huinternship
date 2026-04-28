<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons + Font -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">

<style>
html { scroll-behavior: smooth; }

body {
    font-family: 'Prompt', sans-serif;
    background: linear-gradient(135deg, #f5f5f5, #e9ecef);
}

/* NAVBAR */
.navbar {
    background: linear-gradient(135deg, #b30000, #ff4d4d);
}
.navbar .nav-link, .navbar-brand {
    color: white !important;
}

/* HERO */
.hero {
    background: linear-gradient(135deg, #b30000, #ff4d4d);
    color: white;
    padding: 60px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

/* CARD MODERN */
.card-modern {
    border: none;
    border-radius: 20px;
    padding: 25px;
    background: white;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: 0.3s;
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
}
.btn-main:hover {
    opacity: 0.9;
}

/* SECTION TITLE */
.section-title {
    font-weight: 600;
    margin-bottom: 30px;
    text-align: center;
}
</style>
</head>

<body>

<?php 
session_start();
if (empty($_SESSION['username'])) {
    header("Location: ./index.html");
    exit();
}
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#home">HU Internship System</a>

    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      ☰
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#course">About Course</a></li>
        <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
        <li class="nav-item"><a class="nav-link" href="#students">Admin</a></li>
        <li class="nav-item"><a class="nav-link" href="#internships">Internships</a></li>

        <!-- เปลี่ยนตรงนี้ -->
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

        <li class="nav-item">
          <a class="nav-link text-warning" href="signout.php">Logout</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">

    <!-- HERO -->
    <div class="hero mb-5" id="home">
        <h2>Welcome to Internship System <?php echo $_SESSION["username"]; ?></h2>
        <p class="mb-0">ยินดีต้อนรับเข้าสู่ระบบฝึกงาน</p>
    </div>

    <!-- COURSE -->
    <div id="course">
        <h3 class="section-title">หลักสูตรของสารสนเทศ</h3>

        <div class="row">
            <div class="col-md-4">
                <div class="card-modern text-center">
                    <i class="bi bi-laptop fs-1 text-danger"></i>
                    <h5 class="mt-2"><strong>การจัดการข้อมูลและสารสนเทศ</strong></h5>
                    <p>สาขาสารสนเทศศึกษามุ่งเน้นการจัดการข้อมูลอย่างเป็นระบบ 
                        ตั้งแต่การจัดเก็บ ค้นหา และเข้าถึงข้อมูล โดยใช้เทคโนโลยีเข้ามาช่วย
                         เพื่อให้สามารถนำข้อมูลไปใช้ประโยชน์ได้อย่างมีประสิทธิภาพในยุคดิจิทัล</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-modern text-center">
                    <i class="bi bi-cpu fs-1 text-danger"></i>
                    <h5 class="mt-2"><strong>การพัฒนาทักษะด้านเทคโนโลยีและการวิเคราะห์</strong></h5>
                    <p>ผู้เรียนจะได้พัฒนาทักษะที่สำคัญ เช่น การออกแบบระบบสารสนเทศ การจัดการฐานข้อมูล 
                        การวิเคราะห์ข้อมูล รวมถึงการคิดเชิงวิเคราะห์และการทำงานอย่างเป็นระบบ</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-modern text-center">
                    <i class="bi bi-briefcase  fs-1 text-danger"></i>
                    <h5 class="mt-2"><strong>โอกาสในการประกอบอาชีพที่หลากหลาย</strong></h5>
                    <p>ผู้สำเร็จการศึกษาสามารถทำงานได้ในหลายสายอาชีพ เช่น นักวิเคราะห์ข้อมูล 
                        นักพัฒนาระบบสารสนเทศ หรือผู้ดูแลและจัดการข้อมูล ในทั้งภาครัฐและเอกชน</p>
                </div>
            </div>
        </div>
    </div>

    <!-- NEWS -->
    <div id="news" class="mt-5">
        <h3 class="section-title">ข่าวประชาสัมพันธ์</h3>

        <div class="row">
            <div class="col-md-4">
                <div class="card-modern">
                    <h6>เปิดรับสมัครทุนการศึกษา "Public Interest Incorporated Foundation NITORI International Scholarship Foundation"</h6>
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-modern">
                    <h6>เปิดรับสมัครนิสิตเข้าร่วมโครงการ TKU's Japan Study Program (JSP) for July 2026</h6>
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-modern">
                    <h6>ประกาศรับสมัครทุนการศึกษา "ทุนเรียนรู้ภาษาและวัฒนธรรมสู่ความเป็นสากล ณ Stafford House International สหราชอาณาจักร"</h6>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- STUDENTS -->
    <div id="students" class="mt-5">
        <h3 class="section-title">ข้อมูลนิสิต</h3>

        <div class="row">
            <div class="col-md-3"><div class="card-modern text-center"><h5><strong>ปี 1 
                พื้นฐานความรู้ด้านสารสนเทศ</strong></h5><p>เน้นการปรับพื้นฐานทั้งด้านการเรียนในระดับมหาวิทยาลัยและความรู้เบื้องต้นเกี่ยวกับสารสนเทศ เช่น
                     การใช้เทคโนโลยี การสื่อสาร และแนวคิดพื้นฐานของการจัดการข้อมูล เพื่อเตรียมความพร้อมสำหรับการเรียนในระดับที่สูงขึ้น</p></div></div>
            <div class="col-md-3"><div class="card-modern text-center"><h5><strong>ปี 2 
                การเรียนรู้วิชาเฉพาะทาง</strong></h5><p>เริ่มศึกษาเนื้อหาที่เกี่ยวข้องกับสาขาสารสนเทศโดยตรง เช่น การจัดการฐานข้อมูล ระบบสารสนเทศ 
                    และการใช้เทคโนโลยีในการจัดเก็บและค้นหาข้อมูล รวมถึงการพัฒนาทักษะการคิดวิเคราะห์</p></div></div>
            <div class="col-md-3"><div class="card-modern text-center"><h5><strong>ปี 3 
                การพัฒนาทักษะเชิงลึก</strong></h5><p>มุ่งเน้นการวิเคราะห์ข้อมูล การออกแบบและพัฒนาระบบสารสนเทศ 
                    รวมถึงการทำโครงงานและการประยุกต์ใช้ความรู้ในการแก้ปัญหา เพื่อเตรียมความพร้อมสำหรับการฝึกงาน</p></div></div>
            <div class="col-md-3"><div class="card-modern text-center"><h5><strong>ปี 4 
                การฝึกปฏิบัติและเตรียมความพร้อมสู่การทำงาน</strong></h5><p>เน้นการนำความรู้ไปใช้ในสถานการณ์จริง ผ่านการฝึกงานหรือโครงการวิจัย
                     พร้อมทั้งพัฒนาทักษะวิชาชีพ เพื่อเตรียมความพร้อมสำหรับการทำงานในอนาคต</p></div></div>
        </div>
    </div>

    <!-- INTERNSHIPS -->
    <div id="internships" class="text-center mt-5">
        <h3 class="mb-3">แบบฟอร์มขอฝึกงาน</h3>
        <a href="regislogin.php" class="btn btn-main">ยื่นคำขอฝึกงาน</a>
    </div>

    <!-- CONTACT -->
    <div class="text-center mt-5 mb-5">
       
        <!-- ปุ่มไป contact.php -->
        <a href="contact.php" class="btn btn-main mt-2">
            ติดต่อเพิ่มเติม
        </a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>