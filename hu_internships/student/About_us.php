<!DOCTYPE html>
<html lang="th">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<meta charset="UTF-8">
<title>About Us</title>

<link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Prompt', sans-serif;
    margin: 0;
    background: #eaeced;
}

/* 🔴 HEADER */
.hero-header {
    position: relative; /* ⭐ สำคัญ (ให้ปุ่มลอยได้) */
    background: linear-gradient(135deg, #c1121f, #780000);
    color: #ffffff;
    text-align: center;
    padding: 70px 20px;
}

.hero-header h1 {
    font-size: 42px;
    margin: 0;
}
.back-btn {
    position: absolute;
    top: 20px;
    left: 20px;

    background-color: #ffffff;
    color: #c1121f;
    padding: 8px 16px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    border: none; /* ❌ เอากรอบออก */
    transition: 0.3s;
}

/* hover */
.back-btn:hover {
    background-color: rgba(255,255,255,0.85); /* แค่จางลงนิด */
    color: #c1121f;
    border: none; /* ❌ ไม่ให้มีกรอบตอน hover */
}

/* 🔴 CONTENT */
.container {
    width: 85%;
    margin: auto;
    padding: 50px 0;
}

/* ABOUT */
.about {
    text-align: center;
    max-width: 800px;
    margin: auto;
}

.about h2 {
    color: #c1121f;
}

.about p {
    color: #040505;
    line-height: 1.8;
}

/* 🔴 IMAGE */
.image-box {
    position: relative;
    text-align: center;
    margin-top: 50px;
}

.image-box img {
    display: block;
    margin: 0 auto;
    max-width: 650px;
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

/* 🔴 HOTSPOT */
.hotspot {
    position: absolute;
    width: 150px;
    height: 150px;
    background: transparent;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.3s;
}

.hotspot:hover {
    transform: scale(1.2);
}

/* popup */
.popup {
    position: absolute;
    background: #ffffff;
    padding: 6px 12px;
    border-radius: 8px;
    top: -38px;
    left: 22px;
    display: none;
    font-size: 13px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    width: 180px;
}

.hotspot:hover .popup {
    display: block;
}
</style>

</head>

<body>

<!-- 🔴 HEADER -->
<div class="hero-header">

    <!-- 🔥 ปุ่มกลับเมนู -->
    <div class="back-btn">
        <a href="../menudisplay.php" class="btn btn-light shadow-sm">
            ← กลับหน้าเมนู
        </a>
    </div>

    <h1>About Us</h1>
</div>

<!-- 🔴 CONTENT -->
<div class="container">

    <div class="about">
        <h2>เกี่ยวกับเรา</h2>
        <p>
            ระบบนี้ถูกพัฒนาขึ้นเพื่อช่วยในการจัดการข้อมูลการฝึกงานของนิสิต
            ให้สามารถติดตาม ตรวจสอบ และบริหารข้อมูลได้อย่างมีประสิทธิภาพ
        </p>
    </div>

    <!-- 🔴 IMAGE + HOTSPOT -->
    <div class="image-box">
        <img src="../img/S__15941657.jpg">

        <!-- 🔥 8 จุด -->
        <div class="hotspot" style="top: 12%; left: 50%;">
            <div class="popup">พุทธิชา หินสูงเนิน 67101010682</div>
        </div>

        <div class="hotspot" style="top: 18%; left: 40%;">
            <div class="popup">วสุนันท์ แซ่เตียว 67101010690</div>
        </div>

        <div class="hotspot" style="top: 27%; left: 60%;">
            <div class="popup">ณัฐณิชา นามโบราณ 67101010665</div>
        </div>

        <div class="hotspot" style="top: 38%; left: 47%;">
            <div class="popup">รติรัตน์ ทิมย้ายงาม 67101010686</div>
        </div>

        <div class="hotspot" style="top: 42%; left: 35%;">
            <div class="popup">กาญจนา ปฏิโย 67101010656</div>
        </div>

        <div class="hotspot" style="top: 46%; left: 60%;">
            <div class="popup">พิชชาภา ชีวชื่น 67101010681</div>
        </div>

        <div class="hotspot" style="top: 57%; left: 45%;">
            <div class="popup">ปัณวรรธน์ จำปาดี 67101010673</div>
        </div>

        <div class="hotspot" style="top: 68%; left: 30%;">
            <div class="popup">ณฑิราภาสุ์ เคลลี่ เชง 67101010661</div>
        </div>

    </div>

</div>

</body>
</html>