  
<?php
session_start();

// ล้างค่าทั้งหมดใน session
$_SESSION = [];
session_destroy();

// Redirect to another page
header("Location: ./index.html");
exit();
?>


