<?php

include("connection.php");

$username_err="";
$email_err="";
$password_err="";
$password2_err="";
if(isset($_POST["submit"]))
{

    if(empty($_POST["username"]))
    {
        $username_err="Username cannot be empty!";
    }

    else if(strlen($_POST["username"])<6)
    {
        $username_err="User Name cannot be less than 6 characters!";
    }

    else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["username"])) {
        $username_err="usarname must consist of uppercase and lowercase letters and numbers!";
        } 
        else{
            $username=$_POST["username"];

        }


        if(empty($_POST["email"])){
            $email_err="Email cannot be empty!";
        }

        else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            $email_err = "İnvalid email format!";
        }

        else
        {
            $email=$_POST["email"];
        }

        if(empty($_POST["password"]))
        {
            $password_err="Password cannot be empty!";
        }

        else
        {
            $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
        }

        if(empty($_POST["password2"]))
        {
            $password2_err="Password2 cannot be empty";
        }

        elseif($_POST["password"]!=$_POST["password2"])
        {
            $password2_err="passwords do not match!";
        }

        else
        {
            $password2=$_POST["password2"];
        }




        

    if(isset($username) && isset($email) && isset($password)){

   
    
    

    $insert="INSERT INTO kullanicilar (user_name, email, passwordv ) VALUES('$username','$email','$password')";
    $runinsert = mysqli_query($connection,$insert);

    if ($runinsert) {
       echo '<div class="alert alert-success" role="alert">
       Registration occured successfully.
     </div>';
    }
    else{
       echo '<div class="alert alert-danger" role="alert">
        Registration failed! There is a problem..
    </div>';
    }

    mysqli_close($connection);

}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>MEMBER REGISTIRATION</title>
  </head>

  <style>

.btn{
  background-color: #182747;
  padding: 5px 20px;
}

.form-label{
  font-family: 'Nunito', sans-serif;
  color:#182747;
}
body{
  background-color: rgb(203, 230, 253);

}
</style>


  <body>
   
  <div class="container p-5">
    <div class="card p-5">

            <form action ="register.php" method="POST">


            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User name</label>
            <input type="text" class="form-control

            <?php
            if(!empty($username_err)){
                echo"is-invalid";
            }
            ?>
            
            " id="exampleInputEmail1" name="username" >
            <div class="invalid-feedback">
            <?php
            echo $username_err;

            ?>
            </div>
        </div>

         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control 
            <?php
            if(!empty($email_err)){
                echo"is-invalid";
            }
            ?>
            
            " id="exampleInputEmail1" name="email" >
            <div class="invalid-feedback">
            <?php
                echo $email_err;
            ?>
            </div>
            </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control 
            <?php
            if(!empty($password_err)){
                echo"is-invalid";
            }
            ?>
            
            " id="exampleInputPassword1" name="password" >
            <div class="invalid-feedback">
            <?php
            echo $password_err;

            ?>
            </div>
        </div>


        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password2</label>
            <input type="password" class="form-control
            <?php
            if(!empty($password2_err)){
                echo"is-invalid";
            }

            ?>
            
            " id="exampleInputPassword1" name="password2" >
            <div class="invalid-feedback">
            <?php
            echo $password2_err;
            ?>

            </div>
        </div>


        <button type="submit" name= "submit" class="btn btn-primary">SUBMIT</button>
        </form>

    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
  </body>
</html>