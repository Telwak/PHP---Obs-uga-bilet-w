<?php
require 'ZamowieniaController.php';
try{
    $Post = array ($_POST['Imie'],$_POST['Pesel'],$_POST ['e-mail'],$_POST['Ilosc']);
    $Model = new Model_index($Post[0],$Post[1],$Post[2],$Post[3]);
    $Return = $Model->Index();

    $Pesel_val = new Pesel_val($Return->getPesel());
    $Pesel = $Pesel_val->Pesel();

    $Query = new Query($Return->getImie(),$Return->getPesel(),$Return->getEmail(),$Return->getIlosc());

    if(!$Pesel)
    {
        header("Location: ../Index.php?Information=Wprowadzono błędny numer pesel." );
        exit();
    }

    $Zapytaj_ile_DlaPesela  = $Query->SelectSum();
    if(!$Zapytaj_ile_DlaPesela)
    {
        header("Location: ../Index.php?Information=Wybrano błędną ilość biletów. Jedna osoba może zakupić łącznie 3 bilety." );
        exit();
    }
    $Zamowienia = $Query->Insert();
    header("Location: ../Index.php?Information=Dziękujemy za rezerwację. Na adres:<b> ".$Return->getEmail(). " </b>został wysłany e-mail z potwierdzeniem rezerwacji." );
    exit();
}
Catch(Exception $E)
{
    echo "Przepraszamy wystąpił nieoczekiwany błąd!". $E->getMessage();
}