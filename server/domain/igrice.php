<?php 

class Igrica{

    public $id_igrice;
    public $naslov;
    public $cena;
    public $ocena;
    public $datum_nastanka;
    public $vrsta;

    public function __construct($id_igrice,$naslov,$cena,$ocena,$datum_nastanka,$vrsta)
	{
        $this->id_igrice=$id_igrice;
        $this->naslov=$naslov;
        $this->cena=$cena;
        $this->ocena=$ocena;
        $this->datum_nastanka=$datum_nastanka;
        $this->vrsta=$vrsta;

	}

    public function ubaciIgricu($data,$db){
		
		if($data['naslov'] === '' || $data['cena'] === '' || $data['ocena'] === ''|| $data['datum_nastanka'] === ''){
		$this-> poruka ='Polja moraju biti popunjena';
		
		}else{
		
			$save=$db->query("INSERT INTO igrice(naslov,cena,ocena,datum_nastanka,id_vrste) VALUES ('".$data['naslov']."','".$data['cena']."','".$data['ocena']."','".$data['datum_nastanka']."','".$data['id_vrste']."')") or die($db->error);
			if($save){
				$this -> poruka = 'Uspesno sacuvana igrica';
			}else{
				$this -> poruka = 'Neuspesno sacuvan igrica';
			}
		}
	}

    public function getPoruka(){
		return $this -> poruka;
	}

	public static function vratiSve($db,$uslov){
		$query="SELECT * FROM igrice i JOIN vrste_igrica v ON i.id_vrste=v.id_vrste".$uslov;
		$query=trim($query);
        $result=$db->query($query) or die($db->error);
        $array=[];
        while($r = $result->fetch_assoc()){
			$vrsta=new Vrsta($r['id_vrste'],$r['naziv_vrste']);
			$igrica=new Igrica($r['id_igrice'],$r['naslov'],$r['cena'],$r['ocena'],$r['datum_nastanka'],$vrsta);
            array_push($array,$igrica);
            }
        return $array;
    }


}

?>

