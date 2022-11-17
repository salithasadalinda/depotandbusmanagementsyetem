<html>
<body style=" background-image: url(userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >
<form action="new_user_form.php" method="post">
<div align="center">
Kindly enter your credentials!!!<br><br>
Password: <input type="password" name="password" required><br><br>
E-mail ID: <input type="text" name="emailid" required><br><br>
Mobile No.: <input type="text" name="mobileno" required><br><br>
dob: <input type="date" name="dob" required><br><br>

<input type="submit" value="Save"><br><br>

<a href="index.htm">Home Page</a>
</div>
</form>
<?php 
if(isset($_POST['password'])&&isset($_POST['emailid'])&&isset($_POST['mobileno'])&&isset($_POST['dob'])){
    require "db.php";
$pwd=$_POST["password"];
$eid=$_POST["emailid"];
$mno=$_POST["mobileno"];
$dob=$_POST["dob"];

$sql = "INSERT INTO user (password,emailid,mobileno,dob) VALUES ('".$pwd."','".$eid."','".$mno."','".$dob."')";
// echo $sql;
    if ($conn->query($sql) === TRUE) 
{
 echo "Hi $eid, <a href=\"index.htm\"> Click here </a> to browse through our website!!! " ;
} 
else 
{
 echo "Error:" . $conn->error. "<br> <a href=\"new_user_form.htm\">Go Back to Login!!!</a> ";
}

$conn->close(); 
}





?>


</body>
</html>
