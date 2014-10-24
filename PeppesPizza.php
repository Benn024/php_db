<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_NAME", "mat");
define("DB_PASSWORD", "");

$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);


if($_GET["action"]=="Radera"){
    $sql = "DELETE FROM langos WHERE id='".$_GET["id"]."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

if($_GET["action"]=="uppdatera"){
    $sql = "UPDATE langos SET Namn='".$_GET["namn"]."',`Topping`='".$_GET["topping"]."',`Pris`='".$_GET["pris"]."' WHERE id='".$_GET["id"]."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    //$stenugnsbakad = $stmt->fetchAll();
    
}

if($_GET["action"]=="add"){
    
    $sql = "INSERT INTO `langos`(`id`, `Namn`, `Topping`, `Pris`) VALUES ('','".$_GET["namn"]."','".$_GET["topping"]."','".$_GET["pris"]."')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    //$stenugnsbakad = $stmt->fetchAll();
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
            echo "<input type='submit' value='Radera' name='action'>";
            echo "<input type='hidden' value='".$ugn["id"]."' name='id'>";
            echo "</td>";
            echo "</tr>";




            
            echo "</form>";
        }
        echo "</table>";
        ?>
        <table>
            <form>
                <br />
                <br />
                <br />
                <input type="text" value="namn" name="namn">
                <br />
                <input type="text" value="topping" name="topping">
                <br />
                <input type="text" value="pris" name="pris">
                <br />
                <input type="submit" value="add" name="action">
            </form>
        </table>
       
        <table>
            <form>
                <br />
                <br />
                <input type="text" value="id" name="id">
                <br />
                <input type="text" value="namn" name="namn">
                <br />
                <input type="text" value="topping" name="topping">
                <br />
                <input type="text" value="pris" name="pris">
                <br />
                <input type="submit" value="uppdatera" name="action">
            </form>
        </table>

    </body>
</html>
