<?PHP
require('../Model/Model.php');
	class ajax extends DB implements Query_SelectSum{

	    public function  Conection_string()
        {
            $mysqli = mysqli_connect($this->Adres,$this->Login,$this->Haslo,$this->DB_name);
            if(!$mysqli)
            {
                throw new Exception('Przepraszamy wystąpił błąd z połączeniem');
            }
            return $mysqli;
        }
	    function SelectSum(){

	$ile = mysqli_query($this->Conection_string(),"select sum(ile_zamowien) as suma from zamowienia");
	if (!$ile)
	 {
		 throw new Exception('Przepraszamy wystąpił błąd');
	 }
	 $wynik = mysqli_fetch_assoc($ile); 
	 $sum = $wynik['suma'];
	 //echo json_encode($sum);
	 $ile->close();
	 return $sum;
        }
}