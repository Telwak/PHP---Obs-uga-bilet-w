<?php
require 'Panel_Controller.php';
try{
    $Index = new Logowanie($_POST['Login'],$_POST['Hasło']);
    $Logowanie = $Index->Select();
    if(!$Logowanie)
    {
        header("Location: ../Index.php?Information=Błędny login lub/i hasło" );
        exit();
    }
    header("Location: ../Panel.php?Information=".$Logowanie->getImie(). " " .$Logowanie->getNazwisko());
}
Catch(Exception $e)
{
    echo "Przepraszamy wystąpił nieoczekiwany błąd!". $e->getMessage();
}
