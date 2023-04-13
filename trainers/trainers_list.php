<?php

require("../conf.php");
require("../header.php");

?>

<h1 style="text-align: center;">Trainers</h1>

<?php $handler_trainers_file = fopen(TRAINERS_DATA, 'r'); ?>

<?php if (file_exists(TRAINERS_DATA) && sizeof(file(TRAINERS_DATA)) > 0): ?>
    <table>
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Surname</th>
        </tr>

        <?php while(($row = fgetcsv($handler_trainers_file)) !== false): ?>
            <tr>
                <td><?= $row[0] ?></td>
                <td><?= $row[1] ?></td>
                <td><?= $row[2] ?></td>
                <td>
                    <a href="trainer_page.php?email=<?= $row[0] ?>" style="text-decoration: none">&#128065;</a>
                </td>
                <td>
                    <form action="trainer_delete.php" method="POST" onsubmit="return confirm('Are you sure?')">
                        <input type="hidden" name="email" value="<?= $row[0] ?>">
                        <button style="color: red; font-weight: bold;">&cross;</button>
                    </form>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
<?php endif ?>

<?php if (isset($_GET["err"])): ?>
    <div style="color: red"><?= $_GET["err"] ?></div>
<?php endif ?>

<form action="trainer_add.php" method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="surname" placeholder="Surname">
    <button>Add</button>
</form>
