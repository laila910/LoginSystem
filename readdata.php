<?php 

    


    require 'includes/login.inc.php';



    $sql = "select * from users order by idUsers desc ";

    $op  = mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>Read Users </h1> <br>

            <?php 
            if(isset($_SESSION['uidUsers'])){
            echo 'WELCOME '.  $_SESSION['uidUsers'];
            }
            ?>
        <!-- <a href="logout.php">Logout</a> -->






      <?php 
      
        // if(isset($_SESSION['message'])){
        //     echo '* '.$_SESSION['message'];
        // }
        //  unset($_SESSION['message']);
      ?>

        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>IdUsers</th>
                <th>UidUsers</th>
                <th>EmailUsers</th>
                <th>pwdUsers</th>
                <!-- <th>Action</th> -->
            </tr>

           <?php    
               while($data = mysqli_fetch_assoc($op)){
           
           ?>


           <tr>
                 <td> <?php echo $data['idUsers'];?></td>
                 <td> <?php echo $data['uidUsers'];?></td>
                 <td> <?php echo $data['emailUsers'];?></td>
                 <td> <?php echo $data['pwdUsers'];?></td>

                 <!-- <td>
                 <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                </td> -->

           </tr> 


         <?php } ?>
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <!-- confirm delete record will be here -->

</body>

</html>