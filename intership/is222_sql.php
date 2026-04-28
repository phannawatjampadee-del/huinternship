<?php
//$host = "127.0.0.1";
//$dbuser = "root";
//$dbpass = "";
//$dbname = "IS222";

$host = ".\SQLNAT";
$connectionOptions = [
    "Database" => "IS222",
    "Uid" => "sa",
    "PWD" => "password@1"
];


//$connect = mysqli_connect($host,$dbuser,$dbpass,$dbname,'3307');
$conn = sqlsrv_connect($host, $connectionOptions);
if($connect){
	echo "Connect Success";
}else{
	echo "Connect Failed";
}

$sql = "INSERT INTO Internships (studentID,firstName, lastName, email,term, company,address, province,startDate,endDate , contact )
VALUES ('6510101020', 'Jannie Shin', 'สารสนเทศศึกษา')";

if ($connect->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>