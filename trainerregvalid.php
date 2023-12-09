<?php 
$tname=$_POST['tname'];
$gender=$_POST['gender'];
$eml=$_POST['eml'];
$pwd=$_POST['pwd'];
$cpwd=$_POST['cpwd'];
$phno=$_POST['phno'];
$addr=$_POST['addr'];

$conn=new mysqli('localhost','root','','gymdb');
if($conn->connect_error)
  {
    die('Connection Failed : '.$conn->connect_error);
  }
else
  {
    $sql="SELECT * FROM trainer WHERE tname='$tname' OR eml='$eml' OR pwd='$pwd' OR phno='$phno'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
    {   
        echo '<script type="text/javascript"> 
        window.onload=function()
        {
            alert("Trainer Details Already Existed");
        }</script>';
        header("Location:trainerreg.html");
    }
    else
    {
      if($pwd!=$cpwd)
      {
        echo '<script type="text/javascript"> 
        window.onload=function()
        {
            alert("Trainer Details Already Existed");
        }</script>';
        header("Location:trainerreg.html");
      }
      else
      {
        $stmt=$conn->prepare("insert into trainer(tname,gender,eml,pwd,cpwd,phno,addr)values(?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sssssis",$tname,$gender,$eml,$pwd,$cpwd,$phno,$addr);
        $stmt->execute();
        header("Location:trainerlogin.html");
        $stmt->close();
        $conn->close();
      }
    }
  }

?>