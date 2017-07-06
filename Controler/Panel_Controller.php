	<?php
	require('../Model/Model.php');

	class Panel extends DB 
	{
		public function Conection_string()
	{
		$mysqli = mysqli_connect($this->Adres,$this->Login,$this->Haslo,$this->DB_name);
		
		if (mysqli_connect_errno())
		{
				throw new Exception('Przepraszamy wystąpił błąd z połączeniem');
		
		}
        return $mysqli;
	}
    }
	class Logowanie  extends Panel implements Query_Select
    {
        protected $Login_Pan = null;
        protected $Haslo_Pan = null;

       public function  __construct($Login,$Haslo)
       {
           $this->Login_Pan = $Login;
           $this->Haslo_Pan = $Haslo;
       }

        public function Select()
	{
	$Ile = mysqli_query($this->Conection_string(),"SELECT * FROM users Where Login = '".$this->Login_Pan."' AND Password = '".$this->Haslo_Pan."'");
	if(!$Ile)
	{
		throw new Exception('Przepraszamy wystąpił błąd');
	}
		
	$Ile_tablica = $Ile->fetch_assoc();
	if($Ile->num_rows > 0)
	{
		$Dane = new Login_model($Ile_tablica["Imie"],$Ile_tablica["Nazwisko"],$Ile_tablica["Login"],$Ile_tablica["Password"]);
		return $Dane;	
	}
	else
	{
		return false;
	}
	

	}
    }
