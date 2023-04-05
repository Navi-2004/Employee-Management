
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Allocation</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    
</head>
<body>
    <div class="center">
        <form action="connection.php" method="post"> 
        <h1>Staff Allocation</h1>
        <div class="form">
            <input type="text" name="" class="textfield" placeholder="Professor ID">
            <input type="text"name="stname"  class="textfield" placeholder="Professor Name">
            <select name="gender" id="" class="textfield"> 
                <option>Select Gender</option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
            </select>
            <input type="text" name="email" class="textfield" placeholder="Email Address">
            <select name="dept" id="" class="textfield">
                <option>Select Department</option>
                 <option value="CSE">CSE</option>
                 <option value="IT">IT</option>
                 <option value="AIDS">AIDS</option>
                 <option value="BME" >BME</option>
                 <option value="ECE">ECE</option>
                 <option value="EEE">EEE</option>
                 <option value="MECH">MECH</option>
                 <option value="Mechatronics">Mechatronics</option>
                 
            </select>
            <input type="submit" value="Search" name="" class="btn">
            <input type="submit" value="Save" name="save" class="btn" style="background-color: blue;
            ">
            <input type="submit" value="Modify" name="" class="btn" style="background-color: blueviolet;">
            <input type="submit" value="Delete" name="" class="btn" style="background-color: yellow;">
            <input type="submit" value="Clear" name="" class="btn" style="background-color: brown;">

            
        </div>
    </form>

    </div>
    
</body>
</html>
<?php
include("connection.php");
?>
<?php
if(isset($_POST['searchdata']))
{
    $search=$_POST['search'];
    $query="SELECT * from allocate where id='$search' ";
    $data=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($data);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Allocation</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    
</head>
<body>

    <div class="center">
        <form action="#" method="POST">
        <h1>Staff Allocation</h1>
        <div class="form" action="#" >
            <input type="text" class="textfield" name="search" placeholder="Search ID" value="<?php if(isset($_POST['searchdata'])){ echo $result['id']; }?>">
            <input type="text" class="textfield" name="name" placeholder="Professor Name" value="<?php if(isset($_POST['searchdata'])){ echo $result['st_name']; }?>">
            <select name="gender" id="" class="textfield"> 
                <option>Select Gender</option>
                 <option value="Male"
                 <?php
                 if($result['st_gender']=="Male")
                 {
                  echo "selected";
                 }
                 ?>
                 >Male</option>
                 <option value="Female"
                 <?php
                 if($result['st_gender']=="Female")
                 {
                  echo "selected";
                 }
                 ?>>Female</option>
            </select>
            <input type="text" name="email" class="textfield" placeholder="Email Address" value="<?php if(isset($_POST['searchdata'])){ echo $result['st_email']; }?>">
            <select name="dept" id="" class="textfield">
                <option>Select Department</option>
                 <option value="CSE"
                 <?php
                 if($result['st_dept']=='CSE')
                 {
                  echo "selected";
                 }
                 ?>
                 >CSE</option>
                 <option value="IT"
                  <?php
                 if($result['st_dept']=='IT')
                 {
                  echo "selected";
                 }
                 ?> >IT</option>
                 <option value="AIDS"
                 <?php
                 if($result['st_dept']=='AIDS')
                 {
                  echo "selected";
                 }
                 ?>
                 >AIDS</option>
                 <option value="BME"
                 <?php
                 if($result['st_dept']=='BME')
                 {
                  echo "selected";
                 }
                 ?>
                  >BME</option>
                 <option value="ECE"
                 <?php
                 if($result['st_dept']=='ECE')
                 {
                  echo "selected";
                 }
                 ?>
                 >ECE</option>
                 <option value="EEE"
                 <?php
                 if($result['st_dept']=='EEE')
                 {
                  echo "selected";
                 }
                 ?>
                  >EEE</option>
                 <option value="MECH"
                 <?php
                 if($result['st_dept']=='MECH')
                 {
                  echo "selected";
                 }
                 ?>
                 >MECH</option>
                 <option value="Mechatronics"
                 <?php
                 if($result['st_dept']=='Mechatronics')
                 {
                  echo "selected";
                 }
                 ?>
                 >Mechatronics</option>
                 
            </select>
            <input type="submit" value="Search" name="searchdata" class="btn">
            <input type="submit" value="Save" name="Save" class="btn" >
            <input type="submit" value="Update" name="update" class="btn" >
            <input type="submit" value="Delete" name="delete" class="btn" onclick="return checkdelete()">
            <input type="reset" value="Clear" name="" class="btn" >

            
        </div>
        
</form>
    </div>
    
</body>
</html>

<script>
    function checkdelete()
    {
       return confirm("Do you want to delete this record?"); 
    }
</script>    

<?php
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
        echo "<script> alert('Data Saved Successfully')</script>";
    }
    else{
        echo "<script> alert('Failed To insert data')</script>";
    }
}
?>
<?php
if(isset($_POST['delete']))
{
    $id=$_POST['search'];
    $query="DELETE FROM allocate WHERE id='$id' ";
    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo "<script> alert('Record Deleted')</script>";
        
    }
    else{
        echo "<script> alert('Failed To Delete data')</script>";

    }
}
?>
<?php
if(isset($_POST['update']))
{
    $id    =  $_POST['search'];
    $name     =  $_POST['name'];
    $gender   = $_POST['gender'];
    $email    =$_POST['email'];
    $dept    =$_POST['dept'];

    $query="UPDATE allocate SET st_name='$name',st_gender='$gender',st_email='$email',st_dept='$dept' WHERE id='$id' " ;
    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo "<script> alert('Record Updated')</script>";
        
    }
    else{
        echo "<script> alert('Failed To Update data')</script>";

    }

}
?>