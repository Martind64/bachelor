<?php
use app\model\Cocktail;
require_once __DIR__ . "/../model/Cocktail.php";
echo "<pre>";

$cocktail = new Cocktail();
$cocktail->description = "A real delicious drink";

echo "------------- A Single Cocktail -------------".PHP_EOL;
$result = $cocktail->read(84);
print_r($result); ECHO PHP_EOL;

echo "------------- All Cocktails -------------".PHP_EOL;
$result = $cocktail->readAll();
print_r($result); ECHO PHP_EOL;


// Create a Cocktail
//$cocktail->name = "A drink";
//$cocktail->description = "Drinkable all year long";
//$cocktail->recipe = "You can add everything you want!";
//$cocktail->imgPath = "img/to/path";
//$result = $cocktail->create();
//echo "------------- Has anything been created? -------------".PHP_EOL;
//echo "A ".$result;

// Update a Cocktail
//$cocktail->name = "An updated drink";
//$cocktail->description = "Drinkable only in the winter";
//$cocktail->recipe = "You can still add everything you want!";
//$cocktail->imgPath = "img/to/path";
//$result = $cocktail->update(88);
//echo "------------- Has anything been updated? -------------".PHP_EOL;
//echo "A ".$result;
