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
            <h2>Te doen</h2>
            <?php
            require_once 'backend/conn.php';
            $query = "SELECT * FROM taken";
            $statement = $conn->prepare("SELECT * FROM taken WHERE status = 'todo'" );
            $statement->execute();
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'todo'): ?>
                <div>
                    <?php echo $taak['titel']; ?>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="column">
            <h2>Bezig</h2>
            <?php
            require_once 'backend/conn.php';
            $query = "SELECT * FROM taken";
            $statement = $conn->prepare("SELECT * FROM taken WHERE status = 'todo'" );
            $statement->execute();
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'Bezig'): ?>
                <div>
                    <?php echo $taak['titel']; ?>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="column">
            <h2>Done</h2>
            <?php
            require_once 'backend/conn.php';
            $query = "SELECT * FROM taken";
            $statement = $conn->prepare("SELECT * FROM taken WHERE status = 'todo'" );
            $statement->execute();
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'Klaar'): ?>
                <div>
                    <?php echo $taak['titel']; ?>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
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
