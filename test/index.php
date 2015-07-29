<?php

include "../src/DateTime.php";

$data = \Valey\Components\DateTime::now();

printf("Current date: %s <br>", $data->addMonth(1));

printf("Add 5 Days: %s <br>", \Valey\Components\DateTime::now()->addDay(5));

printf("parse day 23/07/1992 add 1 month and 5 years: %s <br>", \Valey\Components\DateTime::parse("23/07/1992")->addMonth(1)->addYear(5));

printf("parse day 2015-12-01 15:10:12: <strong>%s</strong> <br>", \Valey\Components\DateTime::parse("2015-12-01 15:10:12", "Y-m-d H:i:s")->ToString("d/m/y H:i:s"));

printf("get timestamp from now: %s", \Valey\Components\DateTime::now()->getTimestamp());