<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";

$cdquery="SELECT * FROM Bus";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Bus_no</td><td>Bus_name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Distance</td><td></td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow['Busno']."</td><td>".$cdrow['tname']."</td><td>".$cdrow['sp']."</td><td>".$cdrow['st']."</td><td>".$cdrow['dp']."</td><td>".$cdrow['dt']."</td><td>".$cdrow['dd']."</td><td>".$cdrow['distance']."</td><td><a href=\"schedule.php?Busno=".$cdrow['Busno']."\"><button>Schedule</button></a></td></tr>
";
}
echo "</table>";

echo " <br><a href=\"insert_into_Bus_3.php\"> Add New Bus </a><br> ";
echo " <br><a href=\"admin_login.php\">Admin Privilage!</a> ";
?>
</body>
</html>
