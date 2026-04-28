<?php include 'connectDB.php';?>
<?php

// เพิ่มข้อมูลลงไปใน my sql

$sql = "INSERT INTO islogin (userid, username, password,roleEnum, email, phonenumber, firstname, lastname, date, time     )
VALUES ('6710101069', 'yourchaper', 'khawfang6455' , 'student' , 'natnichanambo@gmail.com' , '0942492838' , 'ณัฐณิชา' , 'นามโบราณ' , '2026-04-05' ,'14:30:00')";

if ($connect->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>