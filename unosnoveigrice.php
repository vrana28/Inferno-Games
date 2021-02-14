<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/igrice.php";


$vrsta=Vrsta::vratiSve($mysqli);

if(isset( $_POST['dodaj'] )){
	
	$naslov=trim($_POST['naslov']);
	$cena=trim($_POST['cena']);
    $ocena=trim($_POST['ocena']);
    $datum_nastanka=trim($_POST['datum_nastanka']);
    $vrsta=$_POST['vrsta'];
    
	
	
	$data = Array (
				"naslov" => $naslov, 
				"cena" => $cena,
				"ocena" => $ocena,					
				"datum_nastanka" => $datum_nastanka,					
                "id_vrste" => $vrsta,    
        );	
        
	$igrica=new Igrica(null,$naslov,$cena,$ocena,$datum_nastanka,$vrsta);
		
		$igrica->ubaciIgricu($data,$mysqli);
		
        $igrica = $igrica->getPoruka();
        header("Location:unosnoveigrice.php");
}
?>

<html>

<head>
    <?php
        include('head.php');
    ?>
    <title>Unos nove PS igrice</title>
</head>

<body>
    <div id="background-img">
    </div>

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
            
        </div>
    </div>
    <div id="inser-form" class="row form-container">
        <div class="col-md-2"><img id="games-logo-img" src="img/games-logo.jpg" alt="" width="900" height="600" ></div>
        <div id="games" class="col-md-4"></div>
        <div class="col-md-4">
            <form name="unosIgrice" action="" onsubmit="return validateForm()" method="POST" role="form">
                <div class="form-group">
                    <label for="naslov">Naslov igrice:</label>
                    <input type="text" class="form-control" name="naslov" id="naslov" placeholder="Unesite naslov igrice">
                </div>
                <div class="form-group">
                    <label for="cena">Cena igrice:</label>
                    <input type="text" class="form-control" name="cena" id="cena" placeholder="Unesite cenu igrice">

                </div>
                <div class="form-group">
                    <label for="ocena">Ocena igrice:</label>
                    <input type="text" class="form-control" name="ocena" id="ocena" placeholder="Unesite ocenu igrice">

                </div>

                <div class="form-group">
                    <label for="datum_nastanka">Datum pustanja igrice:</label>
                    <input type="text" class="form-control" name="datum_nastanka" id="datum_nastanka" placeholder="Unesite datum pustanja igrice u prodaju">

                </div>

                <div class="form-group">
                    <label for="vrsta">Vrsta igrice:</label>

                    <select class="form-control" name="vrsta" id="vrsta">
                        <?php foreach($vrsta as $v): ?>
                        <option value="<?php echo $v->id_vrste;?>">
                            <?php echo $v->naziv_vrste;?>
                        </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Dodaj</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>