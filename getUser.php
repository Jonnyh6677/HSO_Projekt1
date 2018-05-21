<?php
 session_start(); //Ganz wichtig
$vers= intval($_SESSION['versnr']);
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
$sql = "Select P.VersNr,P.VName,P.NName,P.GebDatum,P.Ort,P.TelNr FROM Patient P WHERE P.VersNr = '".$vers."'";
$result = $conn->query($sql);
echo "<table class='table'>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<tr><td>Vers.Nr.</td><td>" . $row['VersNr'] . "</td></tr>";
    echo "<tr><td>Vorname</td><td>" . $row['VName'] . "</td></tr>";
    echo "<tr><td>Nachname</td><td>" . $row['NName'] . "</td></tr>";
    echo "<tr><td>Geburtstag</td><td>" . $row['GebDatum'] . "</td></tr>";
    echo "<tr><td>Ort</td><td>" . $row['Ort'] . "</td></tr>";
    echo "<tr><td>Telefon</td><td>" . $row['TelNr'] . "</td></tr>";
}
echo "</table>";
$conn->close();
?>
