<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cms';

$con = mysqli_connect($host, $user, $pass,$db);
if (!$con) {
    die('Can not connect mysqli');
    exit;}

$user = $_POST['name'];
$pass = $_POST['pass'];
$val = 2;
// switch ($type) {
//     case 'student':
        $sql = "SELECT * from login_table WHERE `User_name`='$user' and `Password`='$pass' and `usr_lvl`='$val' ";
        $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                              $id = $row["usr_lvl"];
                              session_start();

                              $_SESSION['id'] = $id;
                              mysqli_close($con);

                              header('location:../home.php');

                            }}
                            else {
                              header('location:../index.html');
                            }

                            ?>