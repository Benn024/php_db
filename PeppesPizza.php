<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_NAME", "mat");
define("DB_PASSWORD", "");

$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_SPECIAL_CHARS);
$topping = filter_input(INPUT_POST, 'topping', FILTER_SANITIZE_SPECIAL_CHARS);
$pris = filter_input(INPUT_POST, 'pris', FILTER_SANITIZE_SPECIAL_CHARS);

if($_POST["action"]=="Radera"){
    $sql = "DELETE FROM langos WHERE id='".$_POST["id"]."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

if($_POST["action"]=="uppdatera"){
    
    $sql = "UPDATE langos SET Namn='".$namn."',`Topping`='".$topping."',`Pris`='".$pris."' WHERE id='".$id."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    //$stenugnsbakad = $stmt->fetchAll();
    
}

if($_POST["action"]=="add"){
    $sql = "INSERT INTO `langos`(`id`, `Namn`, `Topping`, `Pris`) VALUES ('','".$namn."','".$topping."','".$pris."')";
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
            echo "<form method='POST' class='knapp';>";

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
            <form method='POST'>
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
            <form method='POST'>
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
