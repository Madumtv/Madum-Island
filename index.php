<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Madum-Island Predictions</title>
    <style>
        table { border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Madum-Island</h1>

    <p>Liste des prochains matchs (donnés par l'API https://www.thesportsdb.com). Faites vos pronos sans mise d'argent !</p>
    <?php
    $events = [];
    $url = 'https://www.thesportsdb.com/api/v1/json/1/eventsnextleague.php?id=4328'; // Premier League par exemple

    <p>Liste des prochains matchs (donnés par l'API sportdb.net). Faites vos pronos sans mise d'argent !</p>
    <?php
    $events = [];

    $data = @file_get_contents($url);
    if ($data !== false) {
        $json = json_decode($data, true);
        if ($json && isset($json['events'])) {
            $events = $json['events'];
        }
    }
    if ($events) {
        echo "<table><tr><th>Date</th><th>Match</th></tr>";
        foreach ($events as $event) {
            $date = htmlspecialchars($event['dateEvent']);
            $home = htmlspecialchars($event['strHomeTeam']);
            $away = htmlspecialchars($event['strAwayTeam']);
            echo "<tr><td>$date</td><td>$home vs $away</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Impossible de recuperer les donnees.</p>";
    }
    ?>
</body>
</html>
