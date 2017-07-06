
<!doctype html>
<html>
     <head>
  <meta charset="UTF-8">
<title>Panel Administracyjny</title>
<script src="Script/JQUERY/jquery-3.2.1.min.js"></script>
<script src="Script/JQUERY_UI/jquery-ui.min.js"></script>
<link rel="stylesheet" href="Script/JQUERY_UI/jquery-ui.min.css">
<link rel="stylesheet" href="CSS/style.css">
<script src="Script/JS.js"></script>
</head>
<body>


</body>
<?php
	echo "Witaj: ".@$_GET["Information"] ; 
	
?>
 <a href="Index.php">[Strona główna]</a>
<div id ="Grid">
<table>
    <thead>
        <tr>
            <th>Imię</th>
            <th>E-mail</th>
			<th>Pesel</th>
            <th>Łączna liczba biletów</th>
        </tr>
    </thead>
    <tbody>
<?php
require_once 'Controler/GridController.php';
$Zapytanie = new Select();
$Polaczenie = $Zapytanie ->Conection_string();
$Wynik = $Zapytanie ->Send_Select_query($Polaczenie);

 while($Rekordy = mysqli_fetch_array($Wynik, MYSQLI_ASSOC)){ ?>
 <tr>
			<?php $Grid = new Rekordy($Rekordy['imie'],$Rekordy['Pesel'],$Rekordy['E_mail'],$Rekordy['Ile_zamowien']); ?>
            <td><?php print_r ($Grid->getImie()); ?></td>
            <td><?php print_r ($Grid->getPesel()); ?></td>
			<td><?php print_r ($Grid->getEmail()); ?></td>
			<td><?php print_r ($Grid->getIle()); ?></td>
	</tr>
	
<?php
}
?>

  </tbody>
</table> 
</div>