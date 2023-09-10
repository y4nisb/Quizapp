<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div className="App">
    <nav class ="nav">
        <ul>
            <li>
            <a href="index.php">Hinzufügen</a>
            </li>
            <li>
           <a href="lernen.php">Lernen</a>
            </li>
</nav>
      <h1>Eingabe</h1>
      <form action="data.php" methode="post">
        <input class="elFremd" name="elFremd" type="text" />
        Satz in der Fremdsprache
        <br></br>
        <input class="elTrans" name="elTrans" type="text" />
        Übersetztter Satzt ohne das zu lernende Wort
        <br></br>
        <input class="elWort" name="elWort" type="text" />
        Zu lernendes Wort
        <br></br>
        <input type="submit" class="submit" value="speichern" />
      </form>
    </div>
</body>
</html>