<?php 
session_start();

if(isset($_SESSION['cid'])){
   $id=$_SESSION['cid'];
}else{
    //echo 'no session found';exit;
    header('location:fhome.php');
    // echo "string";
    exit();
}
$ddate =date('Y/m/d');
$nmonth = date("m", strtotime("$ddate"));


$val1 = $_POST['btn1'];
$val2 = $_POST['btn2'];
$val3 = $_POST['btn3'];
$val4 = $_POST['btn4'];
$val5 = $_POST['btn5'];
$val6 = $_POST['btn6'];

if($val1){$val1price=findprice($val1);}
else{$val1price=0;}
if($val2){$val2price=findprice($val2);}
else{$val2price=0;}
if($val3){$val3price=findprice($val3);}
else{$val3price=0;}
if($val4){$val4price=findprice($val4);}
else{$val4price=0;}
if($val5){$val5price=findprice($val5);}
else{$val5price=0;}
if($val6){$val6price=findprice($val6);}
else{$val6price=0;}

$sum = $val1price+$val2price+$val3price+$val4price+$val5price+$val6price;
$_SESSION['sum'] = $sum;

$id =  $_SESSION['cid'];
customer($id);


function findprice($val)
    {
                    $host = 'localhost';
                     $user = 'root';
                     $pass = '';
                     $db = 'cms';
                     $con = mysqli_connect($host, $user, $pass,$db);
                     $sql = "SELECT Cost from food_menu WHERE `Food_Name` = '$val'";
                         $result = $con->query($sql);
                            if ($result->num_rows > 0) 
                                {while($row = $result->fetch_assoc()) 
                                        {   return $row['Cost'];
                                        }
                                }         
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
                    Online Payment
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
            <tr>
            <?php if($val1) { echo "<td>".$val1."</td>
                <td>".$val1price."</td>
                <td></td>
                <td>1</td>
                <td>".$val1price."</td>";}?>
            </tr>
            <tr>
                <?php if($val2) { echo "<td>".$val2."</td>
                <td>".$val2price."</td>
                <td></td>
                <td>1</td>
                <td>".$val2price."</td>";}?>

            </tr><tr>
                <?php if($val3) { echo "<td>".$val3."</td>
                <td>".$val3price."</td>
                <td></td>
                <td>1</td>
                <td>".$val3price."</td>";}?>
            </tr><tr>
               <?php if($val4) { echo "<td>".$val4."</td>
                <td>".$val4price."</td>
                <td></td>
                <td>1</td>
                <td>".$val4price."</td>";}?>
            </tr><tr>
                <?php if($val5) { echo "<td>".$val5."</td>
                <td>".$val5price."</td>
                <td></td>
                <td>1</td>
                <td>".$val5price."</td>";}?>
            </tr><tr>
                <?php if($val6) { echo "<td>".$val6."</td>
                <td>".$val6price."</td>
                <td></td>
                <td>1</td>
                <td>".$val6price."</td>";}?>
            </tr>
            
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
        <form action="/canteen/faculty/paynow.php" method="post">
            <center><button style="font-size: 35px;" name="print">PAY NOW</button></form>

         <form action="/canteen/faculty/paylater.php" method="post"><button style="font-size: 35px;" name="paylater">PAY LATER</button></center></form>
            
        
         
    </div>
    </div>
    
</body>
</html>