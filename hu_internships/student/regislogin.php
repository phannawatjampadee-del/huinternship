<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Internships System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            padding: 24px;
        }
        .register-card {
            width: 100%;
            max-width: 450px;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: none;
        }
        .register-header {
            background: linear-gradient(160deg, #4b4e58, #f02626);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        .register-header h3 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .register-header p {
            margin: 10px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .card-body {
            padding: 40px 35px;
        }
        .form-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }
        .input-group-text {
            background-color: #f8fafc;
            border-right: none;
            color: #64748b;
            border-radius: 12px 0 0 12px;
        }
        .form-control {
            border-left: none;
            padding: 12px 15px;
            border-radius: 0 12px 12px 0;
            background-color: #f8fafc;
            transition: all 0.3s;
        }
        .form-control:focus {
            background-color: #ffffff;
            border-color: #f02626;
            box-shadow: 0 0 0 4px rgba(240, 38, 38, 0.1);
            z-index: 3;
        }
        .btn-save {
            padding: 14px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 12px;
            background: linear-gradient(135deg, #f02626, #d81d1d);
            border: none;
            color: white;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(240, 38, 38, 0.3);
            background: linear-gradient(135deg, #d81d1d, #c41a1a);
        }
        .back-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
        }
        .back-link a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .back-link a:hover {
            color: #f02626;
        }
    </style>
</head>
<body>

<div class="register-card">
    <div class="register-header">
        <i class="bi bi-person-plus-fill" style="font-size: 3rem; margin-bottom: 10px; display: block;"></i>
        <h3>สมัครสมาชิก</h3>
        <p>สร้างบัญชีเพื่อเข้าใช้งานระบบฝึกงาน</p>
    </div>

    <div class="card-body">
        <form method="post" action="save_user.php">

            <div class="mb-4">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="username" class="form-control" placeholder="ตั้งชื่อผู้ใช้" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="ตั้งรหัสผ่าน" required>
                </div>
            </div>

            <button type="submit" class="btn btn-save w-100">
                <i class="bi bi-check-circle-fill me-2"></i> ยืนยันการสมัคร
            </button>

        </form>

        <div class="back-link">
            <a href="http://localhost/hu_internships/index.html">
                <i class="bi bi-arrow-left"></i> กลับไปหน้าเข้าสู่ระบบ
            </a>
        </div>
    </div>
</div>

</body>
</html>