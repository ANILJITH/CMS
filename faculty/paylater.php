<?php
session_start();

if(isset($_SESSION['cid'])){
   $id=$_SESSION['cid'];
}else{
    //echo 'no session found';exit;
    header('location:../login.html');
    exit();
}


$amount = $_SESSION['sum'];
$id = $_SESSION['cid'];
addcredit($id,$amount);
addpay($id,$amount);
header('location:/canteen/faculty/fhome.php');


 function addcredit($id,$sum)
    {
                    $host = 'localhost';
                     $user = 'root';
                     $pass = '';
                     $db = 'cms';
                    $con = mysqli_connect($host, $user, $pass,$db);
                     $pt = $sum/10;
                        $sql2 = "SELECT * from faculty WHERE `Fa_id`='$id'"; 
                         $result2 = $con->query($sql2);

                            if ($result2->num_rows > 0) 
                                {  

                                   while($row2 = $result2->fetch_assoc()) 
                                        {   $point=$row2['Points'];
                                        }
                                }
                                $b=number_format(round((float)$pt,2),2);

                                $a=number_format(round((float)$point,2),2);

                                $credit=$a+$b;


                         $sql="UPDATE faculty SET Points='$credit' WHERE `Fa_id` = '$id'";
                         if (!mysqli_query($con,$sql)) {
                                                    die('Error: ' . mysqli_error($con));
                                                        }
                                                else{
                                    
                                             }     
            mysqli_close($con);
        }

function addpay($id,$total1)
    {      echo "string";
         $host = 'localhost';
         $user = 'root';
         $pass = '';
         $db = 'cms';
         $con = mysqli_connect($host, $user, $pass,$db);
         if (!$con) {
             die('Can not connect mysqli');
             exit;}

                                 $sqls = "SELECT * from faculty WHERE `Fa_id`='$id'"; 

                                $results = $con->query($sqls);

                            if ($results->num_rows > 0) 
                                {   
                                    while($rows = $results->fetch_assoc())
                                    {
                                       $amntt = $rows['Bill']; 
                                    }
                                }         

             $sql = "SELECT * from login_table WHERE `C_id`='$id'"; 

             $result = $con->query($sql);

                            if ($result->num_rows > 0) 
                                {   

                                    $addamnt = $total1+$amntt;
                                    $sql1="UPDATE faculty SET `Bill`='$addamnt' WHERE `Fa_id` = '$id'";  
                                    if (!mysqli_query($con,$sql1)) {
                                                    die('Error: ' . mysqli_error($con));
                                                        }          
                                }    

                            if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }
    }
?>