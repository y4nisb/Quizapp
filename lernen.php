<nav class="nav">
    <ul>
        <li>
            <a href="index.php">Hinzufügen</a>
        </li>
        <li>
            <a href="lernen.php">Lernen</a>
        </li>
</nav>
<h1> Lernen </h1>
<text>Kleiner Tipp:
    Du musst das Ergebnis immer zwei mal angeben.
</text><br>
<br>
<?php
session_start();

//Verbindung zu Datenbank erstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Quiz";
$conn = new mysqli($servername, $username, $password, $dbname);

if (!isset($_SESSION['currentRow'])) {
    $_SESSION['currentRow'] = 1;
}


// hier lege ich ein session limit fest. Das bedeutet, dass nur so viele rows selected werden, wie die session grad hat
// heisst beim ersten durchgang nur das erste element
// beim 2. mal dann das 2. Element usw
$sql = "SELECT * FROM TVoci LIMIT " . ($_SESSION['currentRow'] - 1) . ", 1";
$result = mysqli_query($conn, $sql);

// ich hatte das Problem, dass die Session nie aufgehört hat,
// deswegen schaue ich hier was die maximale Anzahl an Reihen ist die gemacht werden können
$total_sql = "SELECT COUNT(*) as total FROM TVoci";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$totalRows = $total_row['total'];

// wenn alle Reihen durchlaufen sind wird hört das Programm auf 
if ($_SESSION['currentRow'] > $totalRows) {
    echo "All questions have been answered!";
    session_destroy();
    exit;
}
// mit einem For loop durch das Result vom Select durch um dann die zu sehenden Elemente zu erstellen
foreach ($result as $row) {
    echo "Satz: ", $row['fremd'] . '<br>';
    echo "Übersetzung: ", $row['deutsch'], "?" . '<br>';
    echo "was ist das fehlende Wort?" . '<br>';
    $gesucht = $row["Wort"];
?>
    <form method="get" action="lernen.php">
        <input type="text" name="wort" id="wort" value=""><br>
        <input type="submit" name="submit" value="Bestätigen">
    </form>
<?php
    // hier überprüfe ich, ob wort nicht null ist, dann assigne ich guess zu meinem Wort und überprüfe,
    // ob es mit dem gesuchten Wort übereinstimmt.
    // die Row wird um eins erweitert damit in der nächsten Runde das nächste element angezeigt wird
    if (isset($_GET["wort"])) {
        $guess = $_GET["wort"];
        if ($guess == $gesucht) {
            echo "richtig" . '<br>';
            $_SESSION['currentRow']++;
        } else {
            echo "falsch" . '<br>';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lernen</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
</body>

</html>