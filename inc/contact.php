<?php
$hostname = 'localhost';
$user = 'root';
$pass = 'usbw';
$db_name = 'contact';

//error_reporting(E_ALL);
//ini_set('display_errors', '1'); //to je za debugging

$con = mysqli_connect($hostname,$user,$pass,$db_name);

if(!$con)
	die('Could not connect to the database. Error code: ' . mysqli_connect_error());

$yourName = $con->real_escape_string($_POST['firstname']);
$yourEmail = $con->real_escape_string($_POST['lastname']);//preventa sql injection npr SELECT FROM fsdkgdf '';
$yourPhone = $con->real_escape_string($_POST['email']);
$comments = $con->real_escape_string($_POST['message']);

$con->set_charset('utf8'); //za sumnike

$sql = 
"INSERT INTO contact (name, surname, email, message) VALUES ('".$yourName."','".$yourEmail."', '".$yourPhone."', '".$comments."')";

if ($con->query($sql) === TRUE) {
echo "<h2 align=center><b>Sporočilo poslano. <br> Odgovorili vam bomo v najkrajšem možnem času. <b></h2>";
} else {
echo('Error');
}

$con->close();

header("Location: "); header( "refresh:2; url=../x_events/kontakt.html" );//preusmeritev po 2 sekundah ko se izvede zahteva na tem php na stran kontakt.html
exit;

?>
