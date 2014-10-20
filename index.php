<?php

define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_NAME","mat");
define("DB_PASSWORD","");

$dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_SERVER.';charset=utf8',DB_USER, DB_PASSWORD);

//urvalsfråga
$sql = "SELECT * FROM pizza";

$stmt = $dbh->prepare($sql);
$stmt->execute();

$stenugnsbakad = $stmt->fetchAll();

//echo $katter[0]["name"];
foreach($stenugnsbakad as $ugn){
    echo $ugn["namn"];
    echo "<br>";    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

