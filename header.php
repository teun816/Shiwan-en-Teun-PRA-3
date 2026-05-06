<?php require_once 'backend/config.php'; ?>
<header>
    <div class="container">
        <nav>
            <img src="<?php echo $base_url; ?>/logo-big-v4.png" alt="logo" class="logo">
            <a href="<?php echo $base_url; ?>/index.php">Home</a> |
            <a href="<?php echo $base_url; ?>/tasks/done.php">Done</a>
        </nav>
        <div>
            <?php
            if (isset($_SESSION['username'])) {
                echo "Welkom, " . $_SESSION['username'] . "!";
            }
            if (isset($_SESSION['user_id'])) {
                ?>
                <a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a>
                <?php
            } else {
                ?>
                <a href="<?php echo $base_url; ?>/login.php">Inloggen</a>
                <?php
            }
            ?>
        </div>
</header>