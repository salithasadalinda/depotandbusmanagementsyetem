<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";


$cdquery="SELECT * FROM Bus WHERE Busno='".$_GET["Busno"]."'";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Bus_no</td><td>Bus_name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Distance</td></thead>
";
while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow['Busno']."</td><td>".$cdrow['tname']."</td><td>".$cdrow['sp']."</td><td>".$cdrow['st']."</td><td>".$cdrow['dp']."</td><td>".$cdrow['dt']."</td><td>".$cdrow['dd']."</td><td>".$cdrow['distance']."</td></tr>
";
}
echo "</table>";



$cdquery="SELECT * FROM schedule where Busno='".$_GET["Busno"]."' ORDER BY distance ASC  ";
$cdresult=mysqli_query($conn,$cdquery);
$stations=array();
$arrival=array();
$departure=array();
$distance=array();
$i=0;
while($cdrow=mysqli_fetch_array($cdresult))
{
	$stations[$i]=$cdrow["sname"];
	$arrival[$i]=$cdrow["arrival_time"];
	$departure[$i]=$cdrow["departure_time"];
	$distance[$i]=$cdrow["distance"];
	$i+=1;
}



echo "
<table>
<thead><td>Id</td><td>Staring_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Distance</td><td></td></thead>
";
$temp=0;
while ($temp<$i-1) 
{
	echo "
<tr><td>".($temp+1)."</td><td>".$stations[$temp]."</td><td>".$departure[$temp]."</td><td>".$stations[$temp+1]."</td><td>".$arrival[$temp+1]."</td><td>".($distance[$temp+1]-$distance[$temp])."</td><td><a href=\"seat_plan.php?Busno=".$_GET["Busno"]."&sp=".$stations[$temp]."&dp=".$stations[$temp+1]."\"><button>Seat Plan</button></a></td></tr>
";
$temp+=1;
}
echo "</table>";

echo " <br><a href=\"show_Buss.php\">Go Back to Bus Menu!!!</a><br> ";
echo " <br><a href=\"admin_login.php\">Admin Privilage!</a> ";
?>
</body>
</html>
