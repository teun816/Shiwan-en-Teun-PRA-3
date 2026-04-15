<?php
session_start();

if (!isset($_SESSION['user_id']))
{
    header("Location: login.php");
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
            <div class="teDoen">
            <h2>Te doen</h2>
            <?php foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'Te doen'): ?>
                <div>
                    <?php echo $taak['titel']; ?>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>

        <div class="column">
            <div class="bezig">
            <h2>Bezig</h2>
            <?php foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'Bezig'): ?>
                <div>
                    <?php echo $taak['titel']; ?>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>

        <div class="column">
          <div class="klaar">
            <h2>Done</h2>
            <?php foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'Klaar'): ?>
                <div>
                    <?php echo $taak['titel']; ?>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
         </div>
        </div>

    </div>

    <div class="buttons">
        <a href="<?php echo $base_url; ?>/tasks/create.php">
        <button>Toevoegen</button>
        </a>
        <button>Verwijderen</button>
    </div>

</div>
</main>


</body>

</html>
