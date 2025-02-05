<?php
// hier maak ik mijn items aan
$items = [
    'rock' => '<a href="?item=rock">Rock</a>',
    'paper' => '<a href="?item=paper">Paper</a>',
    'scissors' => '<a href="?item=scissors">Scissors</a>'
];

foreach ($items as $key => $value) {
    echo $value . "<br>";
}

// hier maak ik mijn sessie aan:)
session_start();
// functie om de score te resetten

if (!isset($_SESSION['spelerScore'])) {
    $_SESSION['spelerScore'] = 0;
}

if (!isset($_SESSION['computerScore'])) {
    $_SESSION['computerScore'] = 0;
}


// hier maak ik mijn keuzes aan. de bedoeling is dat de speler een keuze maakt en de computer ook. tot de score van de speler of de computer 3 is. dan reset de score en begint het spel opnieuw.
if (isset($_GET['item'])) {
    $spelerKeuze = $_GET['item'];

    $computerOpties = ['rock', 'paper', 'scissors'];

    $computerKeuze = $computerOpties[array_rand($computerOpties)];

    if ($spelerKeuze == $computerKeuze) {
        $resultaat = "Gelijkspel <br>";
    } elseif (($spelerKeuze == 'rock' && $computerKeuze == 'scissors') ||
              ($spelerKeuze == 'scissors' && $computerKeuze == 'paper') ||
              ($spelerKeuze == 'paper' && $computerKeuze == 'rock')) {
        $resultaat = "Je hebt gewonnen <br>";
        $_SESSION['spelerScore']++;
    } else {
        $resultaat = "De computer heeft gewonnen <br>";
        $_SESSION['computerScore']++;
    }
    
    if ($_SESSION['spelerScore'] > 2 || $_SESSION['computerScore'] > 2) {

        $_SESSION['spelerScore'] = 0;
        $_SESSION['computerScore'] = 0;
        
    }

    // hier print ik de keuzes van de speler en de computer en het resultaat

    echo "Jouw keuze: " . $items[$spelerKeuze] . "<br>";
    echo "De keuze van de computer: " . $items[$computerKeuze] . "<br>";
    echo "Resultaat: " . $resultaat;

    echo "Jouw score: " . $_SESSION['spelerScore'] . "<br>";
    echo "Computer score: " . $_SESSION['computerScore'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rock Paper Scissors</title>
</head>
<body>
    
</body>
</html>