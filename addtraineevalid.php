<?php
$tname=$_POST['tname'];
$gender=$_POST['gender'];
$eml=$_POST['eml'];
$pkey=$_POST['pkey'];
$plan=$_POST['plan'];
$phno=$_POST['phno'];
$addr=$_POST['addr'];

$conn=new mysqli('localhost','root','','gymdb');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error);
}
else
{
  $sql="SELECT * FROM trainee WHERE tname='$tname' OR eml='$eml' OR pkey='$pkey' OR phno='$phno'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
    {
        header("Location:addtrainee.html");
    }
    else
    {
        $stmt=$conn->prepare("insert into trainee(tname,gender,eml,pkey,plan,phno,addr)values(?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sssssis",$tname,$gender,$eml,$pkey,$plan,$phno,$addr);
        $stmt->execute();
        header("Location:trainerdashboard.html");
        $stmt->close();
        $conn->close();
    }
}

?>