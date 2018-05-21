 <?php

 session_start(); //Ganz wichtig

 if(!isset($_SESSION['username'])) {
   echo -1;
   exit;
 }

$versnr = intval($_GET['v']);

$servername = "sql7.freemysqlhosting.net";
$username = "sql7239138";
$password = "vq62S9nvq7";
$dbname = "sql7239138";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "Select P.VersNr From Patient P Where P.VersNr = '".$versnr."' ";


$result = $conn->query($sql);


if ($result->num_rows == 0) {
    $_SESSION['versnr'] = $versnr;
    echo 0;
    exit;
}


$conn->close();
$_SESSION['versnr'] = $versnr;
echo 1;
exit;


?>
