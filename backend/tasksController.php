<?php

require_once("../backend/conn.php");

$action = $_POST['action'];

session_start();

if ($action == "create") {

    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $deadline = $_POST['deadline'];

    // 👇 BELANGRIJK: default status
    $status = "Te doen";

    // 👇 user uit session
    if (!isset($_SESSION['user']['id'])) {
        die("Niet ingelogd");
    }

    $user_id = $_SESSION['user']['id'];

    // simpele validatie
    if (empty($titel) || empty($deadline)) {
        die("Titel en deadline zijn verplicht");
    }

    $query = "INSERT INTO taken 
    (titel, beschrijving, afdeling, status, deadline, user)
    VALUES 
    (:titel, :beschrijving, :afdeling, :status, :deadline, :user)";

    $statement = $conn->prepare($query);
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline,
        ":user" => $user_id
    ]);

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