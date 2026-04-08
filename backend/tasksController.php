<?php

require_once("../backend/conn.php");

$action = $_POST['action'];

if ($action === "create") {

    // Input ophalen
    $titel = trim($_POST['titel']);
    $beschrijving = trim($_POST['beschrijving']);
    $afdeling = $_POST['afdeling'];
    $status = trim($_POST['status']);
    $deadline = ($_POST['deadline']);

    if (empty($deadline)) {
    $errors[] = "Deadline is verplicht.";
}

    // ✅ INSERT query (status automatisch 'todo')
    $sql = "INSERT INTO taken (titel, beschrijving, afdeling, status, deadline)
            VALUES (:titel, :beschrijving, :afdeling, :status, :deadline)";

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':titel' => $titel,
        ':beschrijving' => $beschrijving,
        ':afdeling' => $afdeling,
        ':status' => $status,
        ':deadline' => $deadline
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
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];

    if (empty($deadline)) {
        die("Deadline is verplicht");
    }

    $query = "UPDATE taken 
        SET titel = :titel, 
            beschrijving = :beschrijving, 
            afdeling = :afdeling, 
            status = :status,
            deadline = :deadline
        WHERE id = :id";

    $statement = $conn->prepare($query);
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline,
        ":id" => $id
    ]);

    header("Location: ../tasks/index.php?msg=Taak aangepast");
    exit;
}

if($action == "delete"){
}