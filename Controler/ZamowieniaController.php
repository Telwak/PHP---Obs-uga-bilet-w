<?php

require('../Model/Model.php');
class Pesel_val
{

    private $Pesel;

    public function __construct($Pesel)
    {

        $this->Pesel = $Pesel;
    }

    function Pesel()
    {
        if (!preg_match('/^[0-9]{11}$/', $this->Pesel))
        {
            return false;
        }

        $arrSteps = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
        $intSum = 0;
        for ($i = 0; $i < 10; $i++) {
            $intSum += $arrSteps[$i] * $this->Pesel[$i];
        }
        $int = 10 - $intSum % 10;
        $intControlNr = ($int == 10) ? 0 : $int;
        if ($intControlNr == $this->Pesel[10])
        {
            return true;
        }
        return false;
    }
}
class Model_index
{
    private $Imie  = null;
    private $Pesel = null;
    private $Email = null;
    private $Ilosc = null;

    public function __construct($Imie,$Pesel,$Email,$Ilosc) {

        $this->Imie = $Imie;
        $this->Pesel = $Pesel;
        $this->Email = $Email;
        $this->Ilosc = $Ilosc;
    }
    public function __destruct()
    {
        $this->Imie;
        $this->Pesel;
        $this->Email;
        $this->Ilosc;
    }

    function Index()
    {

        $Dane = new Zamowienia($this->Imie,$this->Pesel,$this->Email,$this->Ilosc);
        return $Dane;
    }

}
class Connect extends DB
{


    public function Conection_string()
    {
        $mysqli = mysqli_connect($this->Adres, $this->Login, $this->Haslo, $this->DB_name);

        if (mysqli_connect_errno()) {

            throw new Exception('Przepraszamy wystąpił błąd z połączeniem');

        }
        return $mysqli;
    }
}
class Query extends Connect implements Query_Insert, Query_SelectSum
{
    private $Imie  = null;
    private $Pesel = null;
    private $Email = null;
    private $Ilosc = null;
    private $Biezace = null;

    public function __construct($Imie,$Pesel,$Email,$Ilosc) {

        $this->Imie = $Imie;
        $this->Pesel = $Pesel;
        $this->Email = $Email;
        $this->Ilosc = $Ilosc;

    }
    public function __destruct()
    {
        $this->Imie;
        $this->Pesel;
        $this->Email;
        $this->Ilosc;
        $this->Biezace;
    }
    public function SelectSum()
	{
	$Ile = mysqli_query($this->Conection_string(),"SELECT SUM(Ile_zamowien) AS Suma FROM zamowienia Where Pesel = '".$this->Pesel."'");
	if (!$Ile)
	{
		throw new Exception('Przepraszamy wystąpił błąd z połączeniem');
	}
	$Wynik = mysqli_fetch_assoc($Ile); 
	$sum = $Wynik['Suma'];
	
		IF($sum + $this->Ilosc > 3)
		{
		return false;
		}
		return true;

	}
		public function Insert()
	{
		
	$Ile = mysqli_query($this->Conection_string(),"INSERT INTO zamowienia ( Imie,Pesel,E_mail,Ile_zamowien)VALUES('".$this->Imie."', '".$this->Pesel."', '".$this->Email."','".$this->Ilosc."')");
		if(!$Ile)
		{
					throw new Exception('Przepraszamy wystąpił błąd');

		}
	
	}
}


	
