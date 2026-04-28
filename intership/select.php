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
echo "<br><br>";

$sql = "SELECT studentID,firstName, lastName, email,term, company,address, province,startDate,endDate , contact FROM Internships"; // Your SQL query
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["studentID"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "email: " . $row["email"] . "address: " . $row["address"] . "<br>";
    }
} else {
    echo "0 results";
}

$connect->close();
?>
