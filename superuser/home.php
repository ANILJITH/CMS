<?php 
session_start();

if(isset($_SESSION['id'])){
   echo "set";
}else{
    //echo 'no session found';exit;
    header('location:index.html');
    exit();
}

echo "start";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="action/logout.php">logout</a>
</body>
</html>
