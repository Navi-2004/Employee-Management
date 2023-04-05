<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$dbname="staff";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    //echo "Connection OK";
}
else{
    echo "Connection Failed".mysqli_connect_error();
}
if(isset($_POST['Save']))
{
    $name     =  $_POST['name'];
    $gender   = $_POST['gender'];
    $email    =$_POST['email'];
    $dept    =$_POST['dept'];
     
    $query = "INSERT INTO allocate(st_name,st_gender,st_email,st_dept ) VALUES ('$name','$gender','$email','$dept')" ;
    
    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo "Data Saved Successfully";
    }
    else{
        echo "Data has not saved";
    }
}


?>

