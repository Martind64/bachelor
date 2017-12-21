<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/18/2017
 * Time: 5:16 PM
 */
namespace app\model;
require_once __DIR__."/../interface/AbstractCRUD.php";
require_once __DIR__."/Model.php";

use app\interfaces\AbstractCRUD;


class Cocktail extends Model
{
    public $name;
    public $description;
    public $recipe;
    public $imgPath;

    public function __construct()
    {
        parent::__construct($this);
    }
}

echo "<pre>";
//$c = new Cocktail();
//$co = $c->readAll();
//echo "----------- RESULT -----------".PHP_EOL;
//print_r($co); ECHO PHP_EOL;
//echo "----------- RESULT -----------".PHP_EOL;
//
//echo $c->getTableName();
