<!doctype html>
<html lang="nl">

<head>
    <title>Taken</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
    <?php require_once '../head.php'; ?>
    <div class="container">
        <h1>Taken</h1>
        <a href="create.php">Nieuwe taak &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

<?php require_once 'create.php'; 
    
$query = "SELECT * FROM taken";
$statement = $conn->prepare($query);
$statement->execute();
$taken = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<div style="height: 300px; background: #ededed; display: flex; justify-content: center; align-items: center; color: #666666;">

<table>
    <tr>
        <th>titel</th>
        <th>beschrijving</th>
        <th>afdeling</th>
        <th>Aanpassen</th>
    </tr>

        <?php foreach($taken as $taak) { ?>
        <tr>
            <td><?php echo $taak['titel']; ?></td>
            <td><?php echo $taak['beschrijving']; ?></td>
            <td><?php echo $taak['afdeling']; ?></td>
            <td><a href="edit.php?id=<?php echo $taak['id']; ?>">Detail</a></td>
        </tr>
        <?php } ?>
</table>

    </div>

</div>

</body>

</html>