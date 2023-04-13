<?php

require("../conf.php");

$email = $_POST["email"];
$name = $_POST["name"];
$surname = $_POST["surname"];

$handler_trainers_file = fopen(TRAINERS_DATA, "r");

if (file_exists(TRAINERS_DATA)) {
    while (($row = fgetcsv($handler_trainers_file)) !== false) {
        if ($row[0] === $email) {
            http_response_code(302);
            header("location: trainers_list.php?err= Email already exists!");
            exit();
        }
    }
}

$handler_trainers_file = fopen(TRAINERS_DATA, "a");
fputcsv($handler_trainers_file, [$email, $name, $surname]);

http_response_code(302);
header("location: trainers_list.php");

?>