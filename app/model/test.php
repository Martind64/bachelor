<?php


use app\model\Cocktail;

require_once __DIR__."/Cocktail.php";

$cocktail = new Cocktail();
$cocktail->description = "A real delicious drink";

$cocktail->update(84);

