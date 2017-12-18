<?php
namespace app\controller\cocktail;
$root = $_SERVER['DOCUMENT_ROOT']."/projects/bachelor/app/";
require_once $root."interface/CRUD.php";
require_once $root."model/CocktailModel.php";


use app\DBHandler;
use app\interfaces\CRUD;
use app\model\CocktailModel;

class Cocktail
{
    public function __construct()
    {
    }

    public function create()
    {
    }

    public function read($id)
    {
        $cocktail = new CocktailModel();
        return $cocktail->read($id);
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
    public function readAll(){
        $cocktail = new CocktailModel();
        return $cocktail->readAll();
    }
}

$cl = new Cocktail();

echo "<pre>";
$cocktails = $cl->read(1);
echo "----------- RESULT -----------".PHP_EOL;
print_r($cocktails); ECHO PHP_EOL;
echo "----------- RESULT -----------".PHP_EOL;


