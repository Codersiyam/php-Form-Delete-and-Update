<?php  
$con=mysqli_connect("localhost","root","","code");
$target_id=$_GET['get_id'];

  $query=mysqli_query($con, "DELETE FROM `form` WHERE `id`='$target_id'");

  if($query){
    echo "<script>
    alert('Yor Data Successfully Deleted');
    window.location.href='data_table.php';
    </script>";
  }


?>