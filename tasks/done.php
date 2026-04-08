<?php
session_start();

if (!isset($_SESSION['user_id']))
{
    header("Location: ../../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once '../head.php'; ?>
    <title>Document</title>
</head>

<body>
    <?php require_once '../header.php'; ?>
    <header>
        <div>
            <p>Deze taken zijn klaar</p>
            <?php
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken 
                WHERE status = 'Done' 
                ORDER BY deadline ASC";
            $statement = $conn->prepare($query);
            $statement->execute();
            $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="meldingen">
                <table>
                    <tr>
                        <th>title</th>
                        <th>beschrijving</th>
                        <th>afdeling</th>
                        <th>status</th>
                        <th>deadline</th>
                        <th>user</th>
                        <th>created_at</th>
                        <th>Aanpassen</th>
                    </tr>
                    <?php foreach ($meldingen as $melding): ?>

                        <tr>
                            <td><?php echo $melding['titel']; ?></td>
                            <td><?php echo $melding['beschrijving']; ?></td>
                            <td><?php echo $melding['afdeling']; ?></td>
                            <td><?php echo $melding['status']; ?></td>
                            <td><?php echo $melding['deadline'] ?></td>
                            <td><?php echo $melding['user'] ?></td>
                            <td><?php echo $melding['created_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>








        </div>
    </header>
</body>

</html>