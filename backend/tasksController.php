<?php

$titel = $_POST['titel'];
$beschrijving = $_POST['beschrijving'];
$afdeling = $_POST['afdeling'];

echo $attractie . " / " . $capaciteit . " / " . $melder;

require_once 'config.php';

$query = "INSERT INTO taken (titel, beschrijving, afdeling)
VALUES(:titel, :beschrijving, :afdeling)";

$statement = $conn->prepare($query);

$statement->execute([
    ":titel" => $titel,
    ":beschrijving" => $beschrijving,
    ":afdeling" => $afdeling,
]);

$items = $statement->fetchAll(PDO::FETCH_ASSOC);

header("Location: ../Task/index.php?msg=Taak opgeslagen");