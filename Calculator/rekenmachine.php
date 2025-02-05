<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $getal1 = $_POST['getal1'];
    $getal2 = $_POST['getal2'];
    $type = $_POST['type'];

    if ($type == 'op') {
        $uitkomst = $getal1 + $getal2;
    } elseif ($type == 'min') {
        $uitkomst = $getal1 - $getal2;
    } elseif ($type == 'delen') {
        $uitkomst = $getal1 / $getal2;
    } elseif ($type == 'keer') {
        $uitkomst = $getal1 * $getal2;
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mijn Rekenmachine:D</title>
</head>
<body>
    <form method="POST">
        <input type="number" name="getal1" placeholder="Getal 1">
        <input type="number" name="getal2" placeholder="Getal 2">
        
        <select name="type">
            <option value="op">+</option>
            <option value="min">-</option>
            <option value="keer">x</option>
            <option value="delen">/</option>
        </select>

        <input type="submit" value="Berekenen" name="Berekenen">
    </form>

    <?php
    if (isset($uitkomst)) {

        echo "<p>Uitkomst: $uitkomst</p>";
    }
    ?>
</body>
</html>