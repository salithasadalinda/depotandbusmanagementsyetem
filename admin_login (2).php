<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
<div align="center">
<?php 
session_start();
if($_POST["uid"]=='admin' AND $_POST["password"]=='admin' )
{
$_SESSION["admin_login"]=True;
}

if($_SESSION["admin_login"]==True)
{
echo " <br><a href=\"insert_into_stations.php\"> Show All Stations </a><br> ";
echo " <br><a href=\"show_Buss.php\"> Show All Buss </a><br> ";
echo " <br><a href=\"show_users.php\"> Show All Users </a><br> ";
echo " <br><a href=\"insert_into_Bus_3.php\"> Enter New Bus </a><br> ";
echo " <br><a href=\"insert_into_seates_3.php\"> Enter Bus Schedule </a><br> ";
echo " <br><a href=\"booked.php\"> View all booked tickets </a><br> ";
echo " <br><a href=\"cancelled.php\"> View all cancelled tickets </a><br> ";
echo " <br><a href=\"logout.php\"> Logout </a><br> ";
}
else 
{

echo "
<form action=\"admin_login.php\" method=\"post\">
User ID: <input type=\"text\" name=\"uid\" required><br>
Password: <input type=\"password\" name=\"password\" required><br>
<input type=\"submit\">
</form>
";
}


?>
<br><a href="index.htm">Home page</a>
</div>
</body>
</html>
