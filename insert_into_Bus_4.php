<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php
session_start();


require "db.php";

$sql = "INSERT INTO Bus (tname,sp,st,dp,dt,dd,distance) VALUES ('".$_SESSION["tname"]."','".$_SESSION["sp"]."','".$_SESSION["st"]."','".$_SESSION["dp"]."','".$_SESSION["dt"]."','".$_SESSION["dd"]."','".$_SESSION["ds"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New Bus record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$cdquery="SELECT Busno FROM Bus where tname='".$_SESSION["tname"]."' AND sp='".$_SESSION["sp"]."' AND dp='".$_SESSION["dp"]."'";
$cdresult=mysqli_query($conn,$cdquery);			
$cdrow=mysqli_fetch_array($cdresult);
$Busno=$cdrow['Busno'];

$sql = "INSERT INTO schedule (Busno,sname,arrival_time,departure_time,distance) VALUES ('".$Busno."','".$_SESSION["sp"]."','".$_SESSION["st"]."','".$_SESSION["st"]."','0')";
$flag=($conn->query($sql));
$temp=1;
while ($temp<=$_SESSION["ns"]) 
{
	$sql = "INSERT INTO schedule (Busno,sname,arrival_time,departure_time,distance) VALUES ('".$Busno."','".$_POST["stn".$temp]."','".$_POST["st".$temp]."','".$_POST["dt".$temp]."','".$_POST["ds".$temp]."')";
	$flag=($conn->query($sql));
	$temp+=1;
}
$sql = "INSERT INTO schedule (Busno,sname,arrival_time,departure_time,distance) VALUES ('".$Busno."','".$_SESSION["dp"]."','".$_SESSION["dt"]."','".$_SESSION["dt"]."','".$_SESSION["ds"]."')";
$flag=($conn->query($sql));

if ($flag === TRUE) {
    echo "New schedule added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br> <a href=\"admin_login.php\">Admin Privilage!</a> ";

?>
</body>
</html>
