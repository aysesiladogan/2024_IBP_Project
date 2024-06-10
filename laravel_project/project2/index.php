<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>Main Page | Course Registration</title>
    
    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/89968653ea.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

</head>
<body>
    
    <section id="menu">
        <div id="logo">Course</div>
        
        
       <nav>
            
            <a href="#mainpage"><i class="fa-solid fa-house-chimney-user ikon"></i>Main Page</a>
            <a href=""><i class="fa-solid fa-book-open-reader ikon"></i>Courses</a>
            <a href="announcement.php"><i class="fa-solid fa-bullhorn"></i> Announcements</a>
            <a href="register.php"><i class="fa-solid fa-right-to-bracket"></i> Sign in</a>
            <a href="#contact"><i class="fa-solid fa-paper-plane ikon"></i>Contact</a>
            

        </nav> 
    </section>

    <section id="mainpage">
        <div id="logo2">
            <h1>Log In</h1>
        </div>
        <a href="panelgiris.php" class="btn btn1">For Admin</a>
        <a href="login.php" class="btn btn2">For Users</a>

    </section>
<br><br><br><br><br>

    <section id="contact">
        <div class="container">
            <h2 id="h3contact">Contact</h2>

            <form action="index.php" method="post">
            <div id="contactopak">
                <div id="formgroup">
                    <div id="leftform">
                        <input type="text" name="name" placeholder="Name Surname" required class="form-control">
                      <!--  <input type="text" name="tel" placeholder="Telephone Number" required class="form-control">-->
                    </div>
                    <div id="rightform">
                        <input type="email" name="mail" placeholder="Email address" required class="form-control">
                        <input type="text" name="subject" placeholder="Topic Title" required class="form-control">
                    </div>
                    <textarea name="message" id="" cols="20" placeholder="Enter message" rows="10" required class="form-control"></textarea>   
                   
                     <input type="submit" value="Send">
                </div>

                
            </div>
            </form>

            <footer>
                <div id="copyright">2024 | All Rights Reserved.</div>

                <div id="socialfooter">
                    <a href="#"><i class="fab fa-facebook-f social"></i></a>

                    <a href="#"><i class="fab fa-google-plus-g social"></i></a>

                    <a href="#"><i class="fab fa-twitter social"></i></a>

                </div>

                <a href="#menu"><i class="fas fa-angle-up" id="up"></i></a>

            </footer>

            

 
                
     

        </div>

    </section>

</body>
</html>

<?php

include("connectionpanel.php");

if(isset($_POST["name"], $_POST["mail"], $_POST["subject"], $_POST["message"]))
{
    $namesurname=$_POST["name"];
    
    $email=$_POST["mail"];
    $subject=$_POST["subject"];
    $message=$_POST["message"];

    $insert="INSERT INTO panelmessage(name_surname, email, title, message) VALUES ('".$namesurname."','".$email."','".$subject."','".$message."')";

    if($connect->query($insert)===TRUE)
    {
        echo "<script>alert('Your message has been sent successfully!')</script>";
    }

    else
    {
        echo "<script>alert('An error occurred while sending your message!')</script>";
    }
}


?>