<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Nieuwe taak</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
    <?php require_once '../header.php'; ?>
    <div class="title1">
        <h1>Taak aanmaken</h1>
    </div>
    <div class="container1">
        <form method="POST" action="../controllers/tasksController.php">

            <label class="label1">Titel:</label><br>
            <input class="input1" type="text" name="titel" required><br><br>

            <label class="label1">Beschrijving:</label><br>
            <textarea class="input1" name="beschrijving" required></textarea><br><br>

            <label class="label1">Afdeling:</label><br>
            <select class="input1" name="afdeling" required style="width: 525px;">
                <option value="">-- Kies afdeling --</option>
                <option value="personeel">Personeel</option>
                <option value="horeca">Horeca</option>
                <option value="techniek">Techniek</option>
                <option value="inkoop">Inkoop</option>
                <option value="klantenservice">Klantenservice</option>
                <option value="groen">Groen</option>
            </select><br><br>

            <label class="label1">Status:</label><br>
            <input class="input1" type="text" name="status" required><br><br>

            <label class="label1" for="deadline">Deadline:</label>
            <input class="input1" type="date" name="deadline" id="deadline" required><br><br>

            <input class="input1"  type="hidden" name="action" value="create">

            <button class="button1" type="submit">Opslaan</button>

        </form>
    </div>

</body>

</html>