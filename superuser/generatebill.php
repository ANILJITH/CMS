<?php 
session_start();

if(isset($_SESSION['id'])){
   $id=$_SESSION['id'];
}else{
    //echo 'no session found';exit;
    header('location:index.html');
    // echo "string";
    exit();
}

$ddate=$_SESSION['ddate'];
$id =  $_SESSION['C_id'];

customer($id);

if(isset($_POST['cancel']))
 {    
    addcredit($id,$ddate,$lvlusr);
 }

 if(isset($_POST['payadd']))
 {   
    addcredit($id,$ddate,$lvlusr); 
    addpay($id,$ddate,$lvlusr);
    header('location:/canteen/superuser/billing.php');
 }

function addpay($id,$ddate,$lvlusr)
    {
         $host = 'localhost';
         $user = 'root';
         $pass = '';
         $db = 'cms';
         $con = mysqli_connect($host, $user, $pass,$db);
         if (!$con) {
             die('Can not connect mysqli');
             exit;}


             $sqla = "SELECT * from purchase WHERE `C_id`='$id' and `Date`='$ddate'"; 
                     $total1 = 0;
                         $resulta = $con->query($sqla);

                            if ($resulta->num_rows > 0) 
                                {  

                                    while($rowa = $resulta->fetch_assoc()) 
                                        {   $amount=$rowa['Amount'];
                                             $total1 = $total1 + $amount;
                                        }
                                }

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

 function addcredit($id,$ddate,$lvlusr)
    {
        switch ($lvlusr) {
            case '0':
                     $host = 'localhost';
                     $user = 'root';
                     $pass = '';
                     $db = 'cms';
                    $con = mysqli_connect($host, $user, $pass,$db);
                     $sql1 = "SELECT * from purchase WHERE `C_id`='$id' and `Date`='$ddate'"; 
                     $total1 = 0;
                         $result1 = $con->query($sql1);

                            if ($result1->num_rows > 0) 
                                {  

                                    while($row1 = $result1->fetch_assoc()) 
                                        {   $amount=$row1['Amount'];
                                             $total1 = $total1 + $amount;
                                        }
                                }


                     $pt = $total1/5;
                     
                        $sql2 = "SELECT * from students WHERE `Stud_id`='$id'"; 
                         $result2 = $con->query($sql2);

                            if ($result2->num_rows > 0) 
                                {  

                                   while($row2 = $result2->fetch_assoc()) 
                                        {   $point=$row2['Points'];
                                        }
                                }

                                $b=number_format(round((float)$pt,2),2);
                                echo "$b";
                                $a=number_format(round((float)$point,2),2);
                                echo "$a";
                                $credit=$a+$b;


                         $sql="UPDATE students SET `Points`='$credit' WHERE `Stud_id` = '$id'";
                         if (!mysqli_query($con,$sql)) {
                                                    die('Error: ' . mysqli_error($con));
                                                        }
                                                else{
                                                 header('location:billing.php');
                                             }
                       

                break;

            case '1':
                    $host = 'localhost';
                     $user = 'root';
                     $pass = '';
                     $db = 'cms';
                    $con = mysqli_connect($host, $user, $pass,$db);
                     $sql1 = "SELECT * from purchase WHERE `C_id`='$id' and `Date`='$ddate'"; 
                     $total1 = 0;
                         $result1 = $con->query($sql1);

                            if ($result1->num_rows > 0) 
                                {  

                                    while($row1 = $result1->fetch_assoc()) 
                                        {   $amount=$row1['Amount'];
                                             $total1 = $total1 + $amount;
                                        }
                                }


                     $pt = $total1/10;
                        $sql2 = "SELECT * from faculty WHERE `Fa_id`='$id'"; 
                         $result2 = $con->query($sql2);

                            if ($result2->num_rows > 0) 
                                {  

                                   while($row2 = $result2->fetch_assoc()) 
                                        {   $point=$row2['Points'];
                                        }
                                }
                                echo "$point";
                                $b=number_format(round((float)$pt,2),2);
                                echo "$b";
                                $a=number_format(round((float)$point,2),2);
                                echo "$a";
                                $credit=$a+$b;


                         $sql="UPDATE faculty SET Points='$credit' WHERE `Fa_id` = '$id'";
                         if (!mysqli_query($con,$sql)) {
                                                    die('Error: ' . mysqli_error($con));
                                                        }
                                                else{
                                                 header('location:billing.php');
                                             }
                      
                break;
            
            default:
                # code...
                break;
            }
            mysqli_close($con);
        }
function customer($id)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'cms';
        $con = mysqli_connect($host, $user, $pass,$db);
        if (!$con) {
            die('Can not connect mysqli');
            exit;}
            $sql = "SELECT * from login_table WHERE `C_id`='$id'";
             $result = $con->query($sql);

                            if ($result->num_rows > 0) 
                                {  

                                    while($row = $result->fetch_assoc()) 
                                     {  
                                        $lvl=$row['usr_lvl'];
                                        $GLOBALS['lvlusr'] = $lvl;
                                        switch ($lvl) 
                                        {
                                            case '0':
                                               $sql1 = "SELECT * from students WHERE `Stud_id`='$id'";
                                               $result1 = $con->query($sql1);

                                               if ($result1->num_rows > 0) 
                                                   {  

                                                       while($row1 = $result1->fetch_assoc()) 
                                                           {
                                                            $GLOBALS['fname'] = $row1['First_Name'];
                                                            $GLOBALS['lname'] = $row1['Last_Name'];
                                                            $GLOBALS['phone']=$row1['Phone_No'];
                                                          }
                                                    }   
                                                break;
                                            case '1':
                                                
                                               $sql1 = "SELECT * from faculty WHERE `Fa_id`='$id'";
                                               $result1 = $con->query($sql1);

                                               if ($result1->num_rows > 0) 
                                                   {  

                                                       while($row1 = $result1->fetch_assoc()) 
                                                           {
                                                            $GLOBALS['fname'] = $row1['First_Name'];
                                                            $GLOBALS['lname']=$row1['Last_Name'];
                                                            $GLOBALS['phone']=$row1['Phone_No'];
                                                          }
                                                    }   
                                                break;
                                            
                                            default:
                                                # code...
                                                break;
                                        }

                                      }
                            }
                                    else
                                      {
                                        mysqli_close($con);
                                        }

    }

function genbill($ddate,$id)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'cms';
        $con = mysqli_connect($host, $user, $pass,$db);
        if (!$con) {
            die('Can not connect mysqli');
            exit;}
            $sql = "SELECT * from purchase WHERE `C_id`='$id' and `Date`='$ddate'"; 
            $total = 0;
             $result = $con->query($sql);

                            if ($result->num_rows > 0) 
                                {  

                                    while($row = $result->fetch_assoc()) 
                                        {
                                             $name=$row['Food_Name'];
                                             $amount=$row['Amount'];
                                             $total = $total + $amount;
                                             $sqll = "SELECT * FROM food_menu WHERE `Food_Name`='$name' ";
                                                $result1 = $con->query($sqll);

                                                        if ($result1->num_rows > 0) 
                                                            {  

                                                            while($row1 = $result1->fetch_assoc()) 
                                                                {
                                                                    $cost=$row1['Cost']; 
                                                                    $qty=$amount/$cost;      
                                                                 }
                                                            } 
                                                            $a="/-";
                                                echo "<tr><td>". $name."</td><td>".$cost."</td><td>".$a."</td><td>".$qty."</td><td>". $amount."</td></tr>";       
                                        } 

                            if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }

               
              else
                {
                    mysqli_close($con);
                  }

    }

    $GLOBALS['sum']=$total;
    $GLOBALS['sum1']=$total;

}
 ?>



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                    <center style="font-size: 33px;"><b>Canteen</b></center>
                        <tr>
                            <td style="font-size: 30px">
                                <center>College Of Engineering Chengannur</center>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td><?php $n = rand(111,999) ?>
                                Invoice Id #: <?php echo"$n" ?><br>
                                Created: <?php echo "$ddate"; ?><br>
                                Due: <?php echo "$ddate"; ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <?php echo "$fname"; ?>
                                <?php echo "$lname"; ?><br>
                                <?php echo "$phone"; ?><br>

                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                <td></td>
                <td></td>
                <td></td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Cash Payment
                </td>
                <td></td>
                <td></td>
                <td></td>
                
                <td>
                    Paid/-
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
                <td></td>
                <td>
                    Quantity
                </td>
                <td>
                    Total
                </td>
            </tr>
            <?php genbill($ddate,$id); ?>
            
            
            <tr class="total">
                <td></td>

                <td></td>

                <td></td>
                                
                <td>
                    <b>Net Total:</b>
                   
                </td>
                <td><b><?php echo "$sum"; ?></b></td>

            </tr>
        </table>
    </div>
    <div>
    <div class="span2">
        <form action="#" method="post">
            <center><button name="cancel"">Print</button><button name="payadd"">Add-Amount</button></center>
        </form>
         
    </div>
    </div>
    
</body>
</html>