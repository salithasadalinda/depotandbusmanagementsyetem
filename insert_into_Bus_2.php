<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

$sql = "INSERT INTO Bus (tname,sp,st,dp,dt,dd) VALUES ('".$_POST["tname"]."','".$_POST["sp"]."','".$_POST["st"]."','".$_POST["dp"]."','".$_POST["dt"]."','".$_POST["dd"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br> <a href=\"admin_login_1.php\">Admin Privilage!</a> ";

$conn->close();
?>

</body>
</html>
