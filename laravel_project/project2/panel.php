
<!--
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}
</style>
</head>
<body>

<h2>Admin Panel</h2>


<table>
  <tr>
    <th>Name-Surname</th>
    <th>Email</th>
    <th>Title</th>
    <th>Message</th>
    <th>Time</th>
  </tr>
  



</table>

</body>
</html>

-->

<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>
<body>

<h2>Admin Panel</h2>

<table>
<tr>
    <th>Name-Surname</th>
    <th>Email</th>
    <th>Title</th>
    <th>Message</th>
    <th>Time</th>
  </tr>

<?php

session_start();

if($_SESSION["user"]=="")
{
  echo "<script>window.location.href='exitpanel.php'</script>";
}

else
{

    echo "Your Username :".$_SESSION['user']."<br>";
    echo "<a href='exitpanel.php'>Log Out</a><br><br><br>";

include("connectionpanel.php");


$choose="Select * From panelmessage";
$result=$connect->query($choose);

if($result->num_rows>0)
      {
          while($pull=$result->fetch_assoc()){
              echo "
              <tr>
                  <td>".$pull['name_surname']."</td>
                  
                  <td>".$pull['email']."</td>
                  <td>".$pull['title']."</td>
                  <td>".$pull['message']."</td>
                  <td>".$pull['time']."</td>
              </tr>
              
              ";
          }
      }
      
      else
      {
          echo "No data recorded in the database was found!";
      }
} 
?>

  
</table>

</body>
</html>

