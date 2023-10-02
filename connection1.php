<?php
//connect to the database in register.php
   /* $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "bca";
    $conn = mysqli_connect($servername, $username, $password, $db_name,3366);
   
    if($conn){
        echo "connection okk !!";
    }
    else{
        echo "Connection failed !!",mysqli_error();
    }
*/

$First_Name =  $_POST['First_Name'];
$Last_Name =   $_POST['Last_Name'];
$Email_Id =    $_POST['Email_Id'];
$Password =    $_POST['Password'];
$Re_password = $_POST['Re_password'];

//data connection
$conn = new mysqli('localhost','root','','bca',3366);
if($conn->connect_error)
{
    die('connection failed : '.$conn->connect_error);
}
else
{
     $stmt = $conn-> prepare("insert into info(First_Name,Last_Name,Email_Id,Password,Re_password)
        values(?,?,?,?,?)");
     $stmt->bind_param("sssss",$First_Name, $Last_Name, $Email_Id, $Password, $Re_password);
     $stmt->execute();
     echo "<script>alert('Registration Succcessfull ...!')  </script>";
     $stmt->close();
     $conn->close();
}
?>
