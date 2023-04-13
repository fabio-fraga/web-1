<?php

require("../conf.php");

$email = $_POST["email"];

$temp_file = tempnam('.', '');
$hander_temp_file = fopen($temp_file, 'w'); 

$trainers_file = fopen(TRAINERS_DATA, 'r');

while (($row = fgetcsv($trainers_file)) !== false) {
    if ($row[0] !== $email) {
        fputcsv($hander_temp_file, $row);
    }
}

fclose($trainers_file);
fclose($hander_temp_file);

rename($temp_file, TRAINERS_DATA);

http_response_code(302);
header("location: trainers_list.php");

?>