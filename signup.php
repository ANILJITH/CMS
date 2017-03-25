<?php 

function is_valid_passwords($pass,$confirmpass) 
{
     if (empty($pass)) {
         echo "Password is required.";
         return false;
     } 
     else if ($pass != $confirmpass) {
         echo '<script language="javascript">';
          echo 'alert("Password Must Be Same")';
          echo '</script>';
         // echo 'Your passwords do not match. Please type carefully.';
         return false;
     }
     
     return true;
}

// function is_valid_id($id)
//   {
//     if (empty($id)) {
//          echo '<script language="javascript">';
//           echo 'alert("Admission Number is required")';
//           echo '</script>';
//          return false;
//      }
//      else
//      {
//       $host = 'localhost';
//       $user = 'root';
//       $pass = '';
//       $db = 'cms';
//       $con1 = mysqli_connect($host, $user, $pass,$db);
//       if (!$con1) {
//       die('Can not connect mysqli');
//       exit;}

//          $sql1 = "SELECT * from `students` WHERE `Stud_id` ='$id' " ;
//          $result = $con1->query($sql1);
//          if ($result->num_rows > 0)
//             {
//               echo '<script language="javascript">';
//               echo 'alert("Enter a valid Student id")';
//               echo '</script>';
//             }
 
//             if (!mysqli_query($con1,$sql1)) {
//                    die('Error: ' . mysqli_error($con1));
//                    echo "Error";
//                        }


//      }




//   }


function create_stud($f_name,$l_name,$s_id,$user_email,$phone_no,$user_batch,$password,$uname,$usrlvl) 
{
      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'cms';
      $con = mysqli_connect($host, $user, $pass,$db);
      if (!$con) {
      die('Can not connect mysqli');
      exit;}

         $sql = " INSERT INTO `students`(`First_Name`, `Last_Name`, `Stud_id`, `Email`, `Phone_No`, `batch`) VALUES 
            ('$f_name','$l_name','$s_id','$user_email','$phone_no','$user_batch')"; 

          $sqll = "INSERT INTO `login_table`(`User_name`, `Password`, `C_id`, `usr_lvl`) VALUES 
            ('$uname','$password','$s_id','$usrlvl')";

            if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }

               else{
                if (!mysqli_query($con,$sqll)) {
                   die('Error: ' . mysqli_error($con));
                       }
                       else{mysqli_close($con);
                       header('location:login.html');}
                                                 
                }
 }

 function create_fac($f_name,$l_name,$fa_id,$user_email,$phone_no,$dept,$password,$uname,$usrlvl)
  {
    $host = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'cms';
      $con = mysqli_connect($host, $user, $pass,$db);
      if (!$con) {
      die('Can not connect mysqli');
      exit;}

         $sql = " INSERT INTO `faculty`(`First_Name`, `Last_Name`, `Fa_id`, `Email`, `phone_no`, `Dept`) VALUES 
            ('$f_name','$l_name','$fa_id','$user_email','$phone_no','$dept')"; 

          $sqll = "INSERT INTO `login_table`(`User_name`, `Password`, `C_id`, `usr_lvl`) VALUES 
            ('$uname','$password','$fa_id','$usrlvl')";

            if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }

               else{
                if (!mysqli_query($con,$sqll)) {
                   die('Error: ' . mysqli_error($con));
                       }
                       else{mysqli_close($con);
                       header('location:login.html');}
                                                 
                }
  }

if (isset($_POST['password1']) && isset($_POST['password2'])){

    // Reading form values
    $f_name =$_POST['f_name'];
    $l_name =$_POST['l_name'];
    $user_email =$_POST['user_email'];
    $phone_no =$_POST['phone_no'];
    $password = $_POST['password1'];
    $cpassword = $_POST['password2'];
    $uname = $_POST['u_name'];
    $usrlvl = $_POST['usr'];


    if (is_valid_passwords($password,$cpassword))
    {
      // echo "same pass";
      // if (is_valid_id($s_id)) {
        # code...
      echo "$usrlvl";

      switch ($usrlvl) {
        case '0':
          # code...
              echo "string11";
               $s_id =$_POST['s_id'];
               $user_batch =$_POST['user_batch'];
               create_stud($f_name,$l_name,$s_id,$user_email,$phone_no,$user_batch,$password,$uname,$usrlvl);
          break;

        case '1':
          # code...
               echo "string2";
               $dept = $_POST['dept'];
               $fa_id=$_POST['fa_id'];
               create_fac($f_name,$l_name,$fa_id,$user_email,$phone_no,$dept,$password,$uname,$usrlvl);
          break;
        
        default:
          # code...
               echo 'Error Registering User!';
          break;
      }

     

    }

    } 



 ?>

 



<!DOCTYPE HTML>
<html>
<head>
<title>CMS Signup :</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourists Reservation Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates, 
 Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style10.css" rel='stylesheet' type='text/css' />
<!--fonts--> 
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">


<!--//fonts--> 
</head>
<body>
<!--background-->
<a href="index.html"><h1> CANTEEN MANAGEMENT SYSTEM </h1></a>

    <div class="bg-agile">
  <div class="book-reservation">
      
    <div class="form-left-agileits-w3layouts bottom-w3ls">
              <label><i class="fa fa-home" aria-hidden="true"></i> Choose a User :</label>
              <select class="form-control">
                <option value="">USERS : </option>
                <option value="form_1">1 : Student</option>
                <option value="form_2">2 : Faculty</option>
              </select>

    </div>
    <div>
        <input style="border: 2px solid rgba(202, 100, 100, 0)" type="text" id="fname" name="f_name" />
    </div>



    <form action="" name="form_1" id="form_1" style="display:none" method="post">
          
          <div class="form-left-agileits-w3layouts bottom-w3ls">
              <label><i class="fa fa-home" aria-hidden="true"></i> Choose a User :</label>
              <select class="form-control" name="usr" id="usr">
                <option value="0">1 : Student</option>
              </select>
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-user" aria-hidden="true"></i> First Name :</label>
            <input type="text" id="fname" name="f_name" placeholder="First name" required=""/>
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Last Name :</label>
            <input type="text" id="lname" name="l_name" placeholder="Last Name" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> User Name :</label>
            <input type="text" id="uname" name="u_name" placeholder="User Name" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Password :</label>
            <input type="password" id="password1" name="password1" placeholder="Password" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Confirm Password :</label>
            <input type="password" id="password2" name="password2" placeholder="Re-type Password" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Student ID :</label>
            <input type="text" id="id" name="s_id" placeholder="Admission No " required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Email :</label>
            <input type="text" id="useremail" name="user_email" placeholder="Your email" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Phone No :</label>
            <input type="number" id="phone" name="phone_no" placeholder="Your Number" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Batch :</label>
            <input type="text" id="batch" name="user_batch" placeholder="Your Batch" required="" />
          </div>
          
          
          <div class="clear"> </div>
          <div class="make">
              <input type="submit" value="Make a Reservation">
          </div>
    </form>



    <form action="" name="form_2" id="form_2" style="display:none" method="post">
           
            <div class="form-left-agileits-w3layouts bottom-w3ls">
              <label><i class="fa fa-home" aria-hidden="true"></i> Choose a User :</label>
              <select class="form-control" name="usr" id="usr">
                <option value="1">2 : Faculty</option>
              </select>
             </div>

            <div class="form-date-w3-agileits">
                  <label><i class="fa fa-user" aria-hidden="true"></i> First Name :</label>
            <input type="text" id="fname" name="f_name" placeholder="First name" required=""/>
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Last Name :</label>
            <input type="text" id="lname" name="l_name" placeholder="Last Name" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> User Name :</label>
            <input type="text" id="uname" name="u_name" placeholder="User Name" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Password :</label>
            <input type="password" id="password1" name="password1" placeholder="Password" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Confirm Password :</label>
            <input type="password" id="password2" name="password2" placeholder="Re-type Password" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Faculty ID :</label>
            <input type="text" id="fa_id" name="fa_id" placeholder="Identification No " required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Email :</label>
            <input type="text" id="useremail" name="user_email" placeholder="Your email" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Phone No :</label>
            <input type="number" id="phone" name="phone_no" placeholder="Your Number" required="" />
          </div>

          <div class="form-date-w3-agileits">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> Department :</label>
            <input type="text" id="dept" name="dept" placeholder="Your Batch" required="" />
          </div>
          
          
          <div class="clear"> </div>
          <div class="make">
              <input type="submit" value="Make a Reservation">
          </div>
    </form>
    </div>
   </div>
   <!--copyright-->
      <div class="copy w3ls">
           <p>&copy;Do you already have an Account : <a href="login.html">Login</a></p>
          </div>



    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/wickedpicker.js"></script>
          <script type="text/javascript">
            $("select").on("change", function() {    
        $("#" + $(this).val()).show().siblings().hide();
    });
          </script>


</body>
</html>