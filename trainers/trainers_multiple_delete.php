<?php

require("../conf.php");

if (!isset($_POST["emails"])) {
    http_response_code(302);
    header("location: trainers_list.php?err='No trainer selected!'");
    exit();
}

$emails = $_POST["emails"];

$temp_file = tempnam('.', '');
$hander_temp_file = fopen($temp_file, 'w'); 

$trainers_file = fopen(TRAINERS_DATA, 'r');

while (($row = fgetcsv($trainers_file)) !== false) {
    if (!in_array($row[0], $emails)) {
        fputcsv($hander_temp_file, $row);
    }
}

fclose($trainers_file);
fclose($hander_temp_file);

rename($temp_file, TRAINERS_DATA);

http_response_code(302);
header("location: trainers_list.php");

?>