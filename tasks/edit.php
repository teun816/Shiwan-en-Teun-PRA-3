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

    <div class="container">
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

        <form action="<?php echo $base_url; ?>../backend/tasksController.php" method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $taak['id']; ?>">

            <input type="text" name="titel" value="<?php echo $taak['titel']; ?>">
            <input type="text" name="beschrijving" value="<?php echo $taak['beschrijving']; ?>">
            <input type="text" name="afdeling" value="<?php echo $taak['afdeling']; ?>">
            <input type="text" name="status" value="<?php echo $taak['status']; ?>">

            <input type="date" name="deadline" 
            value="<?php echo $taak['deadline']; ?>">
            
            <input type="submit" value="Melding opslaan">

        </form>

        <hr>
        <form action="../backend/tasksController.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Verwijderen">
        </form>
        </hr>
    </div>  

</body>

</html>