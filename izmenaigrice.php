<!DOCTYPE html>
<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/igrice.php";

$id=$_GET['id'];

$igrica=Igrica::vratiSve($mysqli," where i.id_igrice=".$id);
$vrsta=Vrsta::vratiSve($mysqli);
$poruka = '';

if (isset($_POST['update'])) {
    $naslov = $_POST['naslov'];
    $cena = $_POST['cena'];
    $ocena = $_POST['ocena'];
    $datum_nastanka = $_POST['datum_nastanka'];
    $vrsta = $_POST['vrsta'];       

    $mysqli->query("UPDATE igrice SET naslov='$naslov', cena='$cena', ocena='$ocena', datum_nastanka='$datum_nastanka',id_vrste='$vrsta' WHERE id_igrice=$id");
    header('location: playstationigre.php');
}
 ?>

<html>

<head>
    <?php
        include('head.php');
    ?>

    <title>Izmena igrice</title>

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
        <div class="col-md-2"></div>
        <div id="teatar-bg-img" class="col-md-4"></div>
        <div class="col-md-4">

            <form style="padding: 15px;" class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label for="naslov">Naslov igrice:</label>
                    <input type="text" class="form-control" name="naslov" id="naslov"
                        value="<?php echo $igrica[0]->naslov; ?>">
                </div>
                <div class="form-group">
                    <label for="cena">Cena igrice:</label>
                    <input type="text" class="form-control" name="cena" id="cena"
                        value="<?php echo $igrica[0]->cena; ?>">
                </div>
                <div class="form-group">
                    <label for="ocena">Ocena:</label>
                    <input type="text" class="form-control" name="ocena" id="ocena"
                        value="<?php echo $igrica[0]->ocena; ?>">
                </div>
                <div class="form-group">
                    <label for="datum_izvodjenja">Datum pustanja u prodaju:</label>
                    <input type="text" class="form-control" name="datum_nastanka" id="datum_nastanka"
                        value="<?php echo $igrica[0]->datum_nastanka; ?>">
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
                    <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>