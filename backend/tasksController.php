<?php
$action = $_POST['action'];

if($action == "create"){
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

    header("Location: ../Task/index.php?msg=Taak opgeslage");
}

if($action == "update"){
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];

    require_once 'conn.php';
    $query = "UPDATE meldingen 
    SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling
    WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        "id" => $id
    ]);
    $melding = $statement->fetch(PDO::FETCH_ASSOC);
    header("Location: ../index.php?msg=Taak opgeslagen")
}

if($action == "delete"){
}