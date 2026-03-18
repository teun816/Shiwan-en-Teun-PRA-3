<?php

require_once("../backend/conn.php");

$action = $_POST['action'];

if ($action === "create") {

    // Input ophalen
    $titel = trim($_POST['titel']);
    $beschrijving = trim($_POST['beschrijving']);
    $afdeling = $_POST['afdeling'];

    // ✅ INSERT query (status automatisch 'todo')
    $sql = "INSERT INTO taken (titel, beschrijving, afdeling, status)
            VALUES (:titel, :beschrijving, :afdeling, 'todo')";

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':titel' => $titel,
        ':beschrijving' => $beschrijving,
        ':afdeling' => $afdeling
    ]);

    // Redirect na succes
    header("Location: ../tasks/index.php");
    exit;
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
    header("Location: ../index.php?msg=Taak opgeslagen");
}

if($action == "delete"){
}