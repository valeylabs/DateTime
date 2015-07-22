<?php

include "../src/DateTime.php";

$data = \Valey\Components\DateTime::now();

printf("Current date: %s <br>", $data->ToString());

printf("Add 5 Days: %s", $data->addDay(5)->ToString("d/F"));