<?php


include_once "db.php";

//Variablen von index.php hohlen
$Fremd = $_GET['elFremd'];
$Satz = $_GET['elTrans'];
$Wort = $_GET['elWort'];


//in Datenbank speichern
if ($Fremd != "" && $Satz != "" && $Wort != "") {
    $sql = "insert into TVoci (fremd, deutsch, Wort) values ('$Fremd','$Satz','$Wort')";
    mysqli_query($db_conn, $sql);
    echo "Daten gespeichert";
} else {
    echo "Bitte alle Felder ausfüllen";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form methode="get" action="index.php">
        <button type="submit" name="submit">Zurück</button>
    </form>
</body>

</html>