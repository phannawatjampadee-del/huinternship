<?php
// ถ้ามี backend สามารถดึงข้อมูลมาแทนค่าตรงนี้ได้
$university = "มหาวิทยาลัยศรีนครินทรวิโรฒ";
$address = "114 สุขุมวิท 23, กรุงเทพ 10110";
$phone = "+66 2-649-5000";
$fax = "+66 2 258 4007";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดต่อเรา</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(135deg, #f5f5f5, #e9ecef);
        }

        .main-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            background: #fff;
        }

        .header {
            background: linear-gradient(135deg, #b30000, #ff4d4d);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .header img {
            width: 60px;
            margin-bottom: 10px;
        }

        .header h4 {
            margin: 0;
            font-weight: 600;
        }

        .content {
            padding: 30px;
            text-align: center;
        }

        .content h5 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        .info {
            color: #6c757d;
            margin-bottom: 10px;
        }

        .footer {
            background: #f8f9fa;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #6c757d;
        }

        .btn-modern {
            border-radius: 30px;
            padding: 10px 25px;
            border: none;
            background: linear-gradient(135deg, #b30000, #ff4d4d);
            color: white;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-modern:hover {
            opacity: 0.85;
            color: white;
        }
    </style>
</head>

<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="main-card">

        <!-- HEADER -->
        <div class="header">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="logo">
          <h4>ติดต่อเรา</h4>
        </div>

        <!-- CONTENT -->
        <div class="content">

          <h5><?php echo $university; ?></h5>

          <div class="info">
            📍 <?php echo $address; ?>
          </div>

          <div class="info">
            📞 <?php echo $phone; ?>
          </div>

          <div class="info">
            📠 <?php echo $fax; ?>
          </div>

        </div>

        <!-- FOOTER -->
        <div class="footer">
          ติดต่อได้ในวันและเวลาราชการ
        </div>

      </div>

      <!-- BUTTON -->
      <div class="text-center mt-4">
        <a href="menudisplay.php" class="btn-modern">
          ← กลับไปหน้าเมนู
        </a>
      </div>

    </div>
  </div>
</div>

</body>
</html>