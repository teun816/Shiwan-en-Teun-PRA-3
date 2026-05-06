<?php

require_once("conn.php");

$action = $_POST['action'];

session_start();

if ($action == "create") {

    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $deadline = $_POST['deadline'];
    $user_id = $_SESSION['user_id'];

    // 👇 BELANGRIJK: default status
    $status = "todo";

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

    header("Location: ../index.php");
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

    header("Location: ../index.php?msg=Taak aangepast");
    exit;
}

if($action == "delete"){
    $id = $_POST['id'];

    require_once 'conn.php';
    $query = "DELETE FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        "id" => $id
    ]);
    header("Location: ../index.php?msg=Melding verwijderd");
}