<?php
namespace app\controller\cocktail;
$root = $_SERVER['DOCUMENT_ROOT']."/projects/bachelor/app/";
require_once $root."interface/CRUD.php";
require_once $root."model/CocktailModel.php";


use app\DBHandler;
use app\interfaces\CRUD;
use app\model\CocktailModel;

class Cocktail extends CocktailModel
{
    public function __construct()
    {
        // set up the DB connection
        parent::__construct();
    }

    public function create()
    {
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

}

$cl = new Cocktail();

echo "<pre>";
$cocktails = $cl->readAll();
echo "----------- RESULT -----------".PHP_EOL;
print_r($cocktails); ECHO PHP_EOL;
echo "----------- RESULT -----------".PHP_EOL;


