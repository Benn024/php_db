<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_NAME", "mat");
define("DB_PASSWORD", "");

$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);


if($_GET["action"]=="Radera"){
    "DELETE FROM `langos` WHERE 'id'";
}

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
        <link rel="stylesheet" href="tja.css">
    </head>
    <body>
        <h1>Hej Välkommen till Peppes Pizza, vi säljer påvärmda Langos!</h1>
        <h6>OBS! Inga pizzor...</h6>
        <img src="http://mia-mia.com/2/Stationerys/Animerade/Animerade11/Pizzabagare.gif" alt="#">
        <?php
        echo "<br />";
        echo "<table border='1'>";
        foreach ($stenugnsbakad as $ugn) {
            echo "<form class='knapp';>";

            echo "<tr>";
            echo "<td>";
            echo $ugn["id"];
            echo "</td>";
            echo "<td>";
            echo $ugn["Namn"];
            echo "</td>";
            echo "<td>";
            echo $ugn["Topping"];
            echo "</td>";
            echo "<td>";
            echo $ugn["Pris"];
            echo "</td>";
            echo "<td>";
            echo "<input type='submit' value='Uppdatera' name='action'>";
            echo "<input type='submit' value='Radera' name='action'>";
            echo "<input type='hidden' value='".$ugn["id"]."' name='id'>";
            echo "</td>";
            echo "</tr>";




            
            echo "</form>";
        }
        echo "</table>";
        ?>
        <!--            <form>
                        <h4>Lägg till Namn</h4>
                        <input type="text" name="laggTillNamn">
                        <h4>Lägg till Topping</h4>
                        <input type="text" name="laggTillTopping">
                        <h4>Lägg till pris</h4>
                        <input type="text" name="laggTillPris">
                        <input type="submit" value="Lagg Till" action="add">
                    </form>
                        <br />
                    <form>
                        <input type="text" name="taBort"
                    </form>    
                        <br />
                    <form>
                        <input type="submit" value="Visa Beställningslista">
                    </form>-->

    </body>
</html>
