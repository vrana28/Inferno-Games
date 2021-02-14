<?php  
 //sort.php  
 include "konekcija.php";
 include "domain/igrice.php";
 include "domain/vrste.php";

 $output = '';  
 $order = $_POST["order"];

 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  

 $uslov = " ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $igrice = Igrica::vratiSve($mysqli,$uslov);
 $output .= '  
 <table class="table"> <tbody> 
      <tr>  
        <th><a class="column_sort" id="naslov" data-order="'.$order.'" href="#">Naslov</a></th>
        <th><a class="column_sort" id="cena" data-order="'.$order.'" href="#">Cena</a></th>
        <th><a class="column_sort" id="ocena" data-order="'.$order.'" href="#">Ocena</a></th>
        <th><a class="column_sort" id="datum_nastanka" data-order="'.$order.'" href="#">Datum pustanja</a></th>
        <th>Vrsta igrice</th>
        <th>Opcije</th>     
      </tr>  
 ';  
 foreach($igrice as $igrice){
    $output=$output.'<tr>';
    $output=$output.'<td>'.$igrice->naslov.'</td>';
    $output=$output.'<td>'.$igrice->cena.'</td>';
    $output=$output.'<td>'.$igrice->ocena.'</td>';
    $output=$output.'<td>'.$igrice->datum_nastanka.'</td>';
    $output=$output.'<td>'.$igrice->vrsta->naziv_vrste.'</td>';
    $output=$output.'<td><a href="brisanjeigrice.php?id='.$igrice->id_igrice.'">
    <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
</a>
<a href="izmenaigrice.php?id='.$igrice->id_igrice.'">
    <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
</a></td>';
    $output=$output.'</tr>';
 }
 $output .= '</tbody></table>';  
 echo $output;  
 ?>  