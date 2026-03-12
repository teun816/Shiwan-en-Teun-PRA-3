<!doctype html>
<html lang="nl">

<head>
    <title>Taken / Aanpassen</title>
    <?php require_once __DIR__.'../index.php'; ?>
</head>

<body>
    <?php 

    if(!isset($_GET['id'])){
        echo
        exit;

    }
    ?>
    <?php
        require_once __DIR__.'../index.php'; ?>

    <div class="container">
        <h1>Taken aanpassen</h1>

        <?php
        $id = $_GET['id'];

        require_once '../backend/config.php';

        $query = "SELECT * FROM taken WHERE id = :id";

        $statement = $conn->prepare($query);

        $statement->execute([":id" => $id]);

        $taak = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="<?php echo $base_url; ?>../backend/tasksController.php" method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $melding['id']; ?>">

            <label for="titel">Titel</label>
            <input type="text" id="titel" name="titel" value="<?php echo $taken['titel']; ?>">

            <label for="beschrijving">Beschrijving</label>
            <input type="text" id="beschrijving" name="beschrijving" value="<?php echo $taken['beschrijving']; ?>">

            <label for="afdeling">Afdeling</label>
            <input type="text" id="afdeling" name="afdeling" value="<?php echo $taken['afdeling']; ?>">
            
            <input type="submit" value="Melding opslaan">

        </form>
    </div>  

</body>

</html>