<?php  
$con=mysqli_connect("localhost","root","","code");
$target_id=$_GET['update_id'];
$data_select=mysqli_query($con, "SELECT * FROM `form` WHERE `id`='$target_id'");
$row=mysqli_fetch_assoc($data_select);

if(isset($_POST['update'])){
    $sname=$_POST['sname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $adderass=$_POST['adderass'];
    $day=$_POST['day'];

$update_query=mysqli_query($con, "UPDATE `form` SET `sname`='$sname',`username`='$username',`email`='$email',`number`='$number',`adderass`='$adderass',`day`='$day' WHERE `id`='$target_id'");
if($update_query){
  echo "<script>
  alert('Successfully Your Data Updated ');
  window.location.href='data_table.php';
  </script>";
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
        <p class="title">Update Your Form</p>
        </div><!--logo_section_end-->
        <form action="#"  method="POST" >
         <div class="form_group">

             <div class="form_field">
                <div class="inbox">
                  <i id="icons" class="fa-solid fa-user"></i>
                    <input type="text" name="sname" placeholder="Full name" class="form_info" value="<?php echo $row['sname'] ?>">
                </div>
                <div class="inbox">
                <i id="icons" class="fa-solid fa-user-plus"></i>
                <input type="text" name="username" placeholder="Username" class="form_info" value="<?php echo $row['username'] ?>">
                </div>
             </div>

             <div class="form_field">
                <div class="inbox">
                <i id="icons" class="fa-solid fa-at"></i>
                <input type="email" name="email" placeholder="Email" class="form_info" value="<?php echo $row['email'] ?>">

                </div>
                <div class="inbox">
                <i id="icons" class="fa-solid fa-phone-volume"></i>
                <input type="tel" name="number" placeholder="Phon Number" class="form_info" value="<?php echo $row['number'] ?>">
                </div>
             </div>

             <div class="form_field">
                <div class="inbox">
                <i id="icons" class="fa-solid fa-map-location"></i>
                <input type="text" name="adderass" placeholder="Adderass" class="form_info" value="<?php echo $row['adderass'] ?>">
                </div>
                <div class="inbox">
                <i id="icons" class="fa-solid fa-calendar-days"></i>
               <input type="date" name="day" class="form_info" value="<?php echo $row['day'] ?>"  >
                </div>
             </div>
         </div>
         <div class="form_button">
            <input type="submit" name="update" value="Regsitraqtion" class="re_btn" >
         </div>

         
        </form><!---form_section_end-->
     </div><!--container_section_end-->
    <!-- ====register_form_design_end==== -->
    
</body>
</html>