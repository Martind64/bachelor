<?php
namespace app\controller\cocktail;
$root = $_SERVER['DOCUMENT_ROOT']."/projects/bachelor/app/";
require_once $root."model/Cocktail.php";


use app\model\Cocktail;

class CocktailController
{
    public function create()
    {
    }

    public function read($id)
    {
        $cocktail = new Cocktail();
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
        $cocktail = new Cocktail();
        return $cocktail->readAll();
    }
}

$cl = new CocktailController();

echo "<pre>";
$cocktails = $cl->read(1);
echo "----------- RESULT -----------".PHP_EOL;
print_r($cocktails); ECHO PHP_EOL;
echo "----------- RESULT -----------".PHP_EOL;


