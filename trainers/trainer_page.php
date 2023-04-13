<?php

require("../conf.php");

$email = $_GET["email"];
$handler_trainers_file = fopen(TRAINERS_DATA, 'r');
$trainer_not_found = true;

while (($row = fgetcsv($handler_trainers_file)) !== false) {
    if ($row[0] === $email) {
        list($email, $name, $surname) = $row;
        $trainer_not_found = false;
    }
}

require("../header.php");

?>

<?php if ($trainer_not_found === true): ?>

    <?php http_response_code(302); ?>
    <h1>Trainer not found!</h1>

<?php else: ?>

    <h1>Trainer</h1>
    <h2><?= $name ?> <?= $surname?></h2>
    <h3>Update trainer information:</h3>    
    <form action="trainer_update.php" method="POST">
        <input type="hidden" name="email" value="<?= $email ?>">
        <input type="text" name="name" value="<?= $name ?>">
        <input type="text" name="surname" value="<?= $surname ?>">
        <button>Update</button>
    </form>

<?php endif ?>