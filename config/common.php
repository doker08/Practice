<?php

define("CONSUMER", 1);
define("DISTRIBUTOR", 2);
define("ADMIN", 3);

function getMeasure(){
    $measures = array("кг", "л");

    return $measures;
}