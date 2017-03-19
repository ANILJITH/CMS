<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cms';

$con = mysqli_connect($host, $user, $pass,$db);
if (!$con) {
    die('Can not connect mysqli');
    exit;}

$type = $_POST['type'];
$user = $_POST['user'];
$pass = $_POST['pass'];
echo "$type";

$sql = "SELECT * from login_table WHERE `User_name`='$user' and `Password`='$pass' and `usr_lvl`='$type'";
        $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                              $cid = $row["C_id"];
                              session_start();

                              $_SESSION['cid'] = $cid;
                              mysqli_close($con);

                              header('location:../home.php');

                            }}
                            else {
                              header('location:../login.html');
                            }
                            ?>