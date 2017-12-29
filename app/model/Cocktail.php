<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/18/2017
 * Time: 5:16 PM
 */
namespace app\model;
require_once __DIR__."/Model.php";

class Cocktail extends Model
{
    public $name;
    public $description;
    public $recipe;
    public $imgPath;

}

$c = new Cocktail();
$c->name = "Drink";
$c->description = "damn";
$c->imgPath = "path/to/img";
//$res = $c->read(50);
//$res = $c->readAll(50);
//$res = $c->update(50);
$c->create();
echo "<pre>";
echo "----------- RESULT -----------".PHP_EOL;
//print_r($res); ECHO PHP_EOL;
echo "----------- RESULT -----------".PHP_EOL;