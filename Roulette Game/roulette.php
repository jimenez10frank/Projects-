<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gokspel</title>
</head>
<body>
    <h1>Gokspel</h1>
    <?php
    session_start();

// hier maak ik een functie om een ranadom getsal tussen 0 en 20 te genereren
    if (!isset($_SESSION["randomNumber"])) {
        $_SESSION["randomNumber"] = rand(0, 20);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $randomNumber = $_SESSION["randomNumber"];
        $guess = $_POST["guess"];

        // hier maak ik een if else functie om te kijken of de gok van de speler gelijk is aan het random getal. als dat zo is dan print ik een bericht dat de speler het juiste getal heeft geraden en genereer ik een nieuw getal. als de gok van de speler lager is dan het random getal dan print ik een bericht dat de gok te laag is en als de gok van de speler hoger is dan het random getal dan print ik een bericht dat de gok te hoog is.
        if ($guess == $randomNumber) {
            echo "<p>Proficiat! Je hebt het juiste getal geraden. Een nieuw getal is gegenereerd.</p>";
            $_SESSION["randomNumber"] = rand(0, 20);
        } elseif ($guess < $randomNumber) {
            echo "<p>Je gok was te laag. Probeer opnieuw!</p>";
        } else {
            echo "<p>Je gok was te hoog. Probeer opnieuw!</p>";
        }
    }
    ?>
    <form method="POST">
        Voer een getal tussen 0 en 20 in:
        <input type="number" name="guess" min="0" max="20" required>
        <input type="submit" value="Gokken">
    </form>
</body>
</html>
