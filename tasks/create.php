<?php
session_start();

if (!isset($_SESSION['user_id']))
{
    header("Location: ../../../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nieuwe taak</title>
</head>
<body>

<h1>Nieuwe taak</h1>

<form method="POST" action="../controllers/tasksController.php">
    
    <label>Titel:</label><br>
    <input type="text" name="titel" required><br><br>

    <label>Beschrijving:</label><br>
    <textarea name="beschrijving" required></textarea><br><br>

    <label>Afdeling:</label><br>
    <select name="afdeling" required>
        <option value="">-- Kies afdeling --</option>
        <option value="personeel">Personeel</option>
        <option value="horeca">Horeca</option>
        <option value="techniek">Techniek</option>
        <option value="inkoop">Inkoop</option>
        <option value="klantenservice">Klantenservice</option>
        <option value="groen">Groen</option>
    </select><br><br>

    <label>Status:</label><br>
    <input type="text" name="status" required><br><br>

    <input type="hidden" name="action" value="create">

    <button type="submit">Opslaan</button>

</form>

</body>
</html>
