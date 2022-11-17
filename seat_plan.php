<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

echo "
<table>
<thead><td>Bus_no</td><td>Starting_Point</td><td>Destination_Point</td></thead>
<tr><td>".$_GET["Busno"]."</td><td>".$_GET["sp"]."</td><td>".$_GET["dp"]."</td></tr>
</table>
";

echo "
<table>
<thead><td>Bus_Class</td><td>Seats_Left</td><td>Fare_Per_Seat</td></thead>
";

$cdquery="SELECT seates.class,seates.seatsleft,seates.fare FROM seates WHERE seates.Busno='".$_GET["Busno"]."' AND seates.sp='".$_GET["sp"]."' AND seates.dp='".$_GET["dp"]."'";
$cdresult=mysqli_query($conn,$cdquery);

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td></tr>
";
}
echo "</table>";

echo " <br><a href=\"schedule.php?Busno=".$_GET['Busno']."\">Go Back to Schedule!!!</a><br> ";
echo " <br><a href=\"show_Buss.php\">Go Back to Bus Menu!!!</a><br> ";
echo " <br><a href=\"admin_login.php\">Admin Privilage!</a> ";
?>
</body>
</html>
