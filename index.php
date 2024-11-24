<?php  
$con=mysqli_connect("localhost","root","","code");
if(isset($_POST['register'])){
   $sname=$_POST['sname'];
   $username=$_POST['username'];
   $email=$_POST['email'];
   $number=$_POST['number'];
   $adderass=$_POST['adderass'];
   $day=$_POST['day'];
   $password=$_POST['password'];
   $c_pass=$_POST['c_pass'];
   $input_error=array();
   if(empty($sname)){
      $input_error['sname']="error";
   }
   if(empty($username)){
      $input_error['username']="error";
   }
   if(empty($email)){
      $input_error['email']="error";
   }
   if(empty($number)){
      $input_error['number']="error";
   }
   if(empty($adderass)){
      $input_error['adderass']="error";
   }
   if(empty($day)){
      $input_error['day']="error";
   }
   if(empty($password)){
      $input_error['password']="error";
   }
   if(empty($c_pass)){
      $input_error['c_pass']="error";
   }
   if(count($input_error)==0){
      $user_unique=mysqli_query($con, "SELECT * FROM `form` WHERE `username`='$username'");
      if(mysqli_num_rows($user_unique)==0){
      $email_unique=mysqli_query($con, "SELECT * FROM `form` WHERE `email`='$email'");
      if(mysqli_num_rows($email_unique)==0){
      if($password==$c_pass){
         $pass32bit=md5($password);
         $query=mysqli_query($con, "INSERT INTO `form`( `sname`, `username`, `email`, `number`, `adderass`, `day`, `password`) VALUES ('$sname','$username','$email','$number,','$adderass','$day','$pass32bit')");
         if($query){
            echo"
            <script>
            alert('Wellcome Sir Your information is Successfully Registed');
            window.location.href='data_table.php';
            </script>";

         }else{
            echo"
            <script>
            alert('Error!');
            window.location.href='index.php';
            </script>";
         }
      }else{
         $input_error['match']="<script>
            alert('Sorry Your confirm Password is not Match!');
            window.location.href='index.php';
            </script>";
      }
      }else{
         $input_error['email_un']="<script>
         alert('The Email Adderass Alraday Exist!');
         window.location.href='index.php';
         </script>";
      }
      }else{
         $input_error['user']="<script>
         alert('The Username Alraday Exist!');
         window.location.href='index.php';
         </script>";
      }
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>
    <!-- ====register_form_design_start==== -->
     <div class="container">
        <div class="logo">
        <i id="logo" class="fa-solid fa-circle-user"></i>
        <p class="title">Registretion</p>
        </div><!--logo_section_end-->
        <form action="#"  method="POST" >
         <div class="form_group">

             <div class="form_field">
                <div class="inbox">
                  <i id="icons" class="fa-solid fa-user"></i>
                    <input type="text" name="sname" placeholder="Full name" class="form_info <?php if(isset($input_error['sname'])){echo $input_error['sname'];} ?>">
                    <span><?php if(isset($input_error['user'])){echo $input_error['user'];} ?></span>
                </div>
                <div class="inbox">
                <i id="icons" class="fa-solid fa-user-plus"></i>
                <input type="text" name="username" placeholder="Username" class="form_info <?php if(isset($input_error['username'])){echo $input_error['username'];} ?>">
                </div>
             </div>

             <div class="form_field">
                <div class="inbox">
                <i id="icons" class="fa-solid fa-at"></i>
                <input type="email" name="email" placeholder="Email" class="form_info <?php if(isset($input_error['email'])){echo $input_error['email'];} ?>">
                <span><?php if(isset($input_error['email_un'])){echo $input_error['email_un'];} ?></span>

                </div>
                <div class="inbox">
                <i id="icons" class="fa-solid fa-phone-volume"></i>
                <input type="tel" name="number" placeholder="Phon Number" class="form_info <?php if(isset($input_error['number'])){echo $input_error['number'];} ?>">
                </div>
             </div>

             <div class="form_field">
                <div class="inbox">
                <i id="icons" class="fa-solid fa-map-location"></i>
                <input type="text" name="adderass" placeholder="Adderass" class="form_info <?php if(isset($input_error['adderass'])){echo $input_error['adderass'];} ?>">
                </div>
                <div class="inbox">
                <i id="icons" class="fa-solid fa-calendar-days"></i>
               <input type="date" name="day" class="form_info <?php if(isset($input_error['day'])){echo $input_error['day'];} ?> "  >
                </div>
             </div>

             <div class="form_field">
                <div class="inbox">
                <i id="icons" class="fa-solid fa-lock"></i>
               <input type="password" name="password" placeholder="Creat a new password" class="form_info <?php if(isset($input_error['password'])){echo $input_error['password'];} ?>">
                </div>
                <div class="inbox">
                <i id="icons" class="fa-solid fa-circle-check"></i>
                <input type="password" name="c_pass" placeholder="Confirm Your Password" class="form_info <?php if(isset($input_error['c_pass'])){echo $input_error['c_pass'];} ?>">
                <span><?php if(isset($input_error['match'])){echo $input_error['match'];} ?></span>

                </div>
             </div>
         </div>

         <div class="form_button">
            <input type="submit" name="register" value="Regsitraqtion" class="re_btn" >
         </div>
        <div class="from_links">
            Have a Account? <a href="#" class="log_link">Login..</a>
        </div>

         
        </form><!---form_section_end-->
     </div><!--container_section_end-->
    <!-- ====register_form_design_end==== -->
    
</body>
</html>