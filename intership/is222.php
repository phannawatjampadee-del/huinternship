<?php
$host = "127.0.0.1";
$dbuser = "root";
$dbpass = "khawfang6455";
$dbname = "IS222";

$connect = mysqli_connect($host,$dbuser,$dbpass,$dbname,'3307');
if($connect){
	echo "Connect Success";
}else{
	echo "Connect Failed";
}

$sql = "INSERT INTO Internships (studentID,firstName, lastName, email,term, company,address, province,startDate,endDate , contact )
VALUES ('6510101022', 'Jannie22','Shin','dd@gmail.com','2','information','108/200 data','bbk','20260322' ,'20290322','khaw')";

if ($connect->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>