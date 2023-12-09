<?php
$uname=$_POST['uname'];
$gender=$_POST['gender'];
$eml=$_POST['eml'];
$phno=$_POST['phno'];
$age=$_POST['age'];
$fdb=$_POST['fdb'];

$conn=new mysqli('localhost','root','','gymdb');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into feedback(uname,gender,eml,phno,age,fdb)values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiis",$uname,$gender,$eml,$phno,$age,$fdb);
    $stmt->execute();
    header("Location:response.html");
    $stmt->close();
    $conn->close();
}

?>