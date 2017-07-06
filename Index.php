<!doctype html>
<html>
     <head>
  <meta charset="UTF-8">
<title>Zamówienie biletów</title>
<script src="Script/JQUERY/jquery-3.2.1.min.js"></script>
<script src="Script/JQUERY_UI/jquery-ui.min.js"></script>
<link rel="stylesheet" href="Script/JQUERY_UI/jquery-ui.min.css">
<link rel="stylesheet" href="CSS/style.css">
<script src="Script/JS.js"></script>

</head>
<body>
<div id = "napis">
<p>Wszystkie pola są wymagane.</p>
</div>
<div style="display:none;" id = "Wyprzedane">
<h1>Przepraszamy. Wszystkie bilety zostały wyprzedane.</h1>
</div>
<form id ="Formularz" action="Controler/ZamowieniaHandler.php" method="post">
  imię: <input type="text" name="Imie" required><br><br>
  Pesel: <input type="number" name="Pesel"  required><br><br>
  e-mail: <input type="email" name="e-mail"required><br><br>
  Ilość biletów: <select name="Ilosc">
  <option id ="1" value="1">1</option>
  <option id ="2" value="2">2</option>
  <option id ="3" value="3">3</option>
</select></br><br>
  <input type="submit" value="Zarezerwuj" >
</form>
</br>
<button type="button" onclick = "Pokaz_panel();">Panel administratora</button></br>
</br>
<div id = "Komunikat">
<?php echo  @$_GET["Information"]; ?>
</div>
<div style="display:none; text-align:center;" class = "Logowanie" title="Panel Administratora">
<form action="Controler/PanelHandler.php" method="post">
  Login: <input type="text" name="Login"required><br><br>
  Hasło: <input type="password" name="Hasło" required><br><br>
  <input type="submit" value="Zaloguj">
</form>

</div>
</body>

</html>