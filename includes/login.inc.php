<?php


if(isset($_POST['login-submit'])){
require "dbh.inc.php";
  $mailuid= $_POST['mailuid'];
  $password=$_POST['pwd'];
  if(empty($mailuid)||empty($password)){
      header("Location: ../index.php?error=emptyfields");
       exit();

  }else{
   
      $sql="SELECT * FROM users where  emailUsers='$mailuid' and pwdUsers='$password';";
      $op  = mysqli_query($conn,$sql);

    
     
      if(mysqli_num_rows($op) == 1){
    
       

          if($row = mysqli_fetch_assoc($op)){
         
             
            //   $pwdcheck = password_verify($password,$row['pwdUsers']);
              if($password !== $row['pwdUsers']){
    
                  header("Location: ../index.php?error=wrongpwd");

                  exit();
              }elseif($password === $row['pwdUsers']){
                 session_start();

                 $_SESSION['userId']= $row['idUsers'];
                 $_SESSION['userUid'] = $row['uidUsers'];
  

                 header("Location: ../index.php?login=success");
                  exit();
              }else{
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
              }

          }else{
               header("Location: ../index.php?error=nouser");
                  exit();
          }

       
      }else{
            header("Location: ../index.php?error=sqlerror");
       exit();
      }
  }

}else{
      header("Location: ../index.php");
     exit();
}

    ?>