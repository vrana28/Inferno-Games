<?php

$id = $_GET['id_vrste'];


include "konekcija.php";
include "domain/igrice.php";
include "domain/vrste.php";

$result=Igrica::vratiSve($mysqli, " where i.id_vrste =".$id);

 $nalepi = '<table class="table "><thead><tr><th>Naslov</th><th>Cena</th><th>Ocena</th><th>Datum nastanka</th><th>Vrsta igrice</th></thead><tbody>';

 foreach($result as $igrice){
    $nalepi=$nalepi.'<tr>';
    $nalepi=$nalepi.'<td>'.$igrice->naslov.'</td>';
    $nalepi=$nalepi.'<td>'.$igrice->cena.'</td>';
    $nalepi=$nalepi.'<td>'.$igrice->ocena.'</td>';
    $nalepi=$nalepi.'<td>'.$igrice->datum_nastanka.'</td>';
    $nalepi=$nalepi.'<td>'.$igrice->vrsta->naziv_vrste.'</td>';
    $nalepi=$nalepi.'</tr>';
 }
 
$nalepi=$nalepi.'</tbody></table>';          


echo($nalepi);


 ?>