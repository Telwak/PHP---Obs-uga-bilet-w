<?php
require('Model/Model.php');

class Select extends DB
{
	public function Conection_string()
	{	$mysqli = mysqli_connect($this->Adres,$this->Login,$this->Haslo,$this->DB_name);	
		
		if (mysqli_connect_errno())
		{
			throw new Exception('Przepraszamy wystąpił błąd');
		}
		return $mysqli;
		}
	public function Send_Select_query()
	{
	$Zapytanie = mysqli_query($this->Conection_string(),"SELECT imie,E_mail,Pesel,Ile_zamowien FROM zamowienia");
	if(!$Zapytanie)
	{
					throw new Exception('Przepraszamy wystąpił błąd');
	}
	return $Zapytanie;
	}
}