<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <div>
            <img src="/logo-big-fill-only.png" alt="DeveloperLand logo" class="logo hidden-on-sm">
            <h1 class="hidden-on-lg">DeveloperLand</h1>
            <a href="/index.php">Index</a>
            <p>Deze taken zijn klaar</p>
            <?php
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken WHERE STATUS = 'Done'";
            $statement = $conn->prepare(query: $query);
            $statement->execute();
            $meldingen = $statement->fetchAll(mode: PDO::FETCH_ASSOC);
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