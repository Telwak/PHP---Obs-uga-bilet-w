<?php
require_once 'AJAX.php';
    $Ajax = new ajax();
    $Rezultat = $Ajax->SelectSum();
echo json_encode($Rezultat);
