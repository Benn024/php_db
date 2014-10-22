<?php

define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_NAME","mat");
define("DB_PASSWORD","");

$dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_SERVER.';charset=utf8',DB_USER, DB_PASSWORD);

//urvalsfråga
$sql = "SELECT * FROM Langos";

$stmt = $dbh->prepare($sql);
$stmt->execute();

$stenugnsbakad = $stmt->fetchAll();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Peppes Pizzeria!</title>
    </head>
    <body>
        <h1>Hej Välkommen till Peppes Pizza, vi säljer påvärmda Langos!</h1>
        <h6>OBS! Inga pizzor...</h6>
        <img src="http://mia-mia.com/2/Stationerys/Animerade/Animerade11/Pizzabagare.gif" alt="#">
            <form>
                <input type="text" name="läggTillNamn">
                <input type="text" name="läggTillTopping">
                <input type="text" name="läggTillPris">
                <input type="submit" value="Lägg Till" action="gör rätt saker">
            </form>
                <br />
            <form>
                <input type="text" name="taBort"
            </form>    
                <br />
            <form>
                <input type="submit" value="Visa Beställningslista">
            </form>
        
    </body>
</html>
