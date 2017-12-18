<?php
namespace app\controller\cocktail;
$root = $_SERVER['DOCUMENT_ROOT']."/projects/bachelor/app/";
require_once $root."interface/CRUD.php";

use app\DBHandler;
use app\interfaces\CRUD;

class Cocktail extends CRUD
{
    public function __construct()
    {
        // set up the DB connection
        parent::__construct('cocktail');
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

$cocktails = $cl->readAll();
echo "----------- RESULT -----------".PHP_EOL;
print_r($cocktails); ECHO PHP_EOL;
echo "----------- RESULT -----------".PHP_EOL;


