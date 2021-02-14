<?php
include "server/konekcija.php";

$id=$_GET['id'];
$sql = "DELETE FROM igrice WHERE id_igrice='".$id."'";
echo $sql;
$mysqli->query($sql) or die($sql);

header("Location:playstationigre.php");
 ?>