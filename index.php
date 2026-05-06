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
            <?php
            require_once 'backend/conn.php';
            $query = "SELECT * FROM taken";
            $statement = $conn->prepare("SELECT * FROM taken WHERE status = 'todo'" );
            $statement->execute();
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'todo'): ?>
                <div>
                   <a href="tasks/edit.php?id=<?php echo $taak['id']; ?>">
                         <?php echo $taak['titel']; ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>

        <div class="column">
            <div class="bezig">
            <h2>Bezig</h2>
            <?php
            require_once 'backend/conn.php';
            $query = "SELECT * FROM taken";
            $statement = $conn->prepare("SELECT * FROM taken WHERE status = 'bezig'" );
            $statement->execute();
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'bezig'): ?>
                <div>
                    <a href="tasks/edit.php?id=<?php echo $taak['id']; ?>">
                         <?php echo $taak['titel']; ?>
                    </a>
                   
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>

        <div class="column">
          <div class="klaar">
            <h2>Done</h2>
            <?php
            require_once 'backend/conn.php';
            $query = "SELECT * FROM taken";
            $statement = $conn->prepare("SELECT * FROM taken WHERE status = 'done'" );
            $statement->execute();
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($taken as $taak): ?>
            <?php if ($taak['status'] == 'done'): ?>
                <div>

                   <a href="tasks/edit.php?id=<?php echo $taak['id']; ?>">
                         <?php echo $taak['titel']; ?>
                    </a>
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
        <button><td><a href="tasks/edit.php?id=<?php echo $taak['id']; ?>">Aanpassen</a></td>></button>
        </a>
        <button><td><a href="tasks/edit.php?id=<?php echo $taak['id']; ?>">Verwijderen</a></td>></button>
        </a>
    </div>

</div>
</main>


</body>

</html>
