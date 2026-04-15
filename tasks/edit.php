<?php
session_start();

if (!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
}
?>
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
            <input type="hidden" name="id" value="<?php echo $taak['id']; ?>">

            <input type="text" name="titel" value="<?php echo $taak['titel']; ?>">
            <input type="text" name="beschrijving" value="<?php echo $taak['beschrijving']; ?>">
            <input type="text" name="afdeling" value="<?php echo $taak['afdeling']; ?>">
            <input type="text" name="status" value="<?php echo $taak['status']; ?>">

            <input type="date" name="deadline" 
            value="<?php echo $taak['deadline']; ?>">
            
            <input type="submit" value="Melding opslaan">

        </form>
    </div>  

</body>

</html>