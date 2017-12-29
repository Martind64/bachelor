<?php


use app\model\Cocktail;

require_once __DIR__."/Cocktail.php";

$cocktail = new Cocktail();

$cocktail->name = "Piña Colada";
$cocktail->description = "Delicious juice and coconut cocktail";
$cocktail->recipe = "Blend ice cubes, pineaple juice, coconut cream and white rum";
$cocktail->imgPath = "path/to/img";

$cocktail->create();

