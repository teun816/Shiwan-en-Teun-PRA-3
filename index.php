<?php
session_start();

if (!isset($_SESSION['user_id']))
{
    header("Location: ../../../login.php");
}
?>
<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once 'head.php'; ?>
</head>

<body>
<?php require_once 'header.php'; ?>
<main>
    <div class="container10">

    <h1>Takenoverzicht</h1>

    <div class="board">

        <div class="column">
            <h2>Te doen</h2>
            <p>taak 1</p>
            <p>taak 2</p>
            <p>taak 3</p>
        </div>

        <div class="column">
            <h2>Bezig</h2>
            <p>taak 4</p>
        </div>

        <div class="column">
            <h2>Afgerond</h2>
            <p>taak 5</p>
            <p>taak 6</p>
        </div>

    </div>

    <div class="buttons">
        <button>Toevoegen</button>
        <button>Verwijderen</button>
    </div>

</div>
</main>


</body>

</html>
