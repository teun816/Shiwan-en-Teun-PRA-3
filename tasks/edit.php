<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Taken / Aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
    <?php
        require_once __DIR__.'../../header.php'; ?>

    <div class="container1">
        <?php
        if(!isset($_GET['id'])) {
            echo "Geen id meegegeven";
            exit;
        }
        ?>
        <h1>Taak aanpassen</h1>
        <?php
        //1. Haal het id uit de url
        $id = $_GET['id'];

        //1. Haal de verbinding erbij
        require_once '../backend/conn.php';

        //2. Query, vul deze aan met een WHERE zodat je alleen de melding met dit id ophaalt
        $query = "SELECT * FROM taken WHERE id = :id";

        //3. Van query naar statement
        $statement = $conn->prepare($query);

        //4. Voer de query uit, voeg hier nog de placeholder toe
        $statement->execute([":id" => $id]);

        //5. Ophalen gegevens, tip: gebruik hier fetch().
        $taken = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="../backend/tasksController.php" method="POST">
            <input class="input1" type="hidden" name="action" value="update">
            <input class="input1" type="hidden" name="id" value="<?php echo $taken['id']; ?>">
            <label class="label1">Titel:</label><br>
            <input class="input1" type="text" name="titel" value="<?php echo $taken['titel']; ?>"><br><br>
            <label class="label1">Beschrijving:</label><br>
            <input class="input1" type="text" name="beschrijving" value="<?php echo $taken['beschrijving']; ?>"><br><br>
            <label class="label1">Afdeling:</label><br>
            <input class="input1" type="text" name="afdeling" value="<?php echo $taken['afdeling']; ?>"><br><br>
            <label class="label1">Status:</label><br>
            <input class="input1" type="text" name="status" value="<?php echo $taken['status']; ?>"><br><br>
            <label class="label1">Deadline:</label><br>
            <input class="input1" type="date" name="deadline" 
            value="<?php echo $taken['deadline']; ?>">    
            <input type="submit" value="Melding opslaan" class="knop">
        </form>

        <form action="../backend/tasksController.php" method="POST">
        <input class="input1" type="hidden" name="action" value="delete">
        <input class="input1" type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Verwijderen" class="knop">
        </form>

    </div>  

</body>

</html>