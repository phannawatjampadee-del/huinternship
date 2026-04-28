<!-- เช็ค DB เบื้องหลัง ไม่โชว์ในเว็บ -->
<?php
// Start the session
session_start();
 $_SESSION["userid"]="";
 $_SESSION["username"]="";
 $_SESSION["userlevel"]="";
?>
<!-- เอาโค้ดจากไฟล์ connectDB.php มารวมกัน -->
<?php include './includes/db_connect.php';?>

<?php
// รับค่าจากหน้าเว็บไซต์
$username = $_POST['uname'];
$passw = $_POST['psw'];

// เช็ค username password ในฐานข้อมูล
$sql = "SELECT * FROM islogin where userid='$username' and password='$passw' ";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $_SESSION["userid"] =$row["userid"];
    $_SESSION["username"] =$row["username"];
    $_SESSION["userlevel"]=$row["roleEnum"];
    
// แสดงชื่อหลัง login สำเร็จ 
    echo $_SESSION["username"];
    ?>

<!-- login สำเร็จให้พาไปหน้าเมนู -->
    <script>    
    window.open("./menudisplay.php","_self");   
    </script>
    <?php
    }
    $connect->close();

// เช็คแล้วว่าไม่มีข้อมูลในระบบจะขึ้นอะไร
} else {
    echo " ไม่มีข้อมูลผู้ใช้นี้ ";
    echo " <a href=http://localhost/hu_internships/>login again</a> ";
}
$connect->close();
?>


