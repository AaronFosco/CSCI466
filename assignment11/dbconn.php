<?PHP
$host = 'students';
$user = 'z1835687';
$password = '-----';
$db = 'z1835687';
$conn = new PDO("mysql:host=$host;dbname=$db",$user,$password);
try
{
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  echo 'ERROR: ' . $e->getMessage();
}
?>
