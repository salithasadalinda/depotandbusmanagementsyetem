<html>
<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";
$sp=$_POST["sp"];
$_SESSION["sp"] = "$sp";
$dp=$_POST["dp"];
$_SESSION["dp"] = "$dp";

$query = mysqli_query($conn,"SELECT t.Busno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.facility,c.fare,c.seatsleft FROM Bus as t,facilityseats as c, schedule as s1,schedule as s2 where s1.Busno=t.Busno AND s2.Busno=t.Busno AND s1.sname='".$sp."' AND s2.sname='".$dp."' AND t.Busno=c.Busno AND c.sp='".$sp."' AND c.dp='".$dp."' AND c.doj='".$doj."' ");

echo "<table><thead><td>Bus No</td><td>Bus_Name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Bus_Class</td><td>Fare</td><td>Seats_Left</td></thead>";

while($row = mysqli_fetch_array($query))
{
 echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr>";
}
echo "</table>";

//$rowcount=mysqli_num_rows($query);
if(mysqli_num_rows($query) == 0)
{
 echo "No such Bus <br> ";

}
?>

If you wish to proceed with booking fill in the following details:<br><br>
<form action="resvn.php" method="post">
Registered Mobile No: <input type="text" name="mno" required><br><br>
Password: <input type="password" name="password" required><br><br>
Enter Bus No: <input type="text" name="tno" required><br><br>
Enter Class: <input type="text" name="class" required><br><br>
No. of Seats: <input type="text" name="nos" required><br><br>
<input type="submit" value="Proceed with Booking"><br><br>
</form>

<?php

echo " <a href=\"enquiry.php\">More Enquiry</a> <br>";

$conn->close(); 
?>

<br><a href="index.htm">Home page</a>
</body>
</html>
