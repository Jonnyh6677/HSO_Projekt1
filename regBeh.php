 <?php
 session_start(); //Ganz wichtig

$vers= intval($_SESSION['versnr']);

$Symp= $_GET['Symp'];
$Diag = $_GET['Diag'];
$Thrp= $_GET['Thrp'];
$Arzt = $_GET['Arzt'];


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



$sql = "INSERT INTO Behandlung(Symptome,Diagnose,Therapie) VALUES('".$Symp."','".$Diag."','".$Thrp."')";
$statement = $conn->prepare($sql);
if(!$statement->execute()) {
  echo "Query fehlgeschlagen: ".$statement->error;
  exit;
}

$new_id = $statement->insert_id;

$sql = "INSERT INTO PatientenBehandlung VALUES(".$new_id.",".$vers.")";
$statement = $conn->prepare($sql);
if(!$statement->execute()) {
  echo "Query fehlgeschlagen: ".$statement->error;
  exit;
}





echo 1;



$conn->close();
?>
