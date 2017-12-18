<?php
namespace app\controller\cocktail;
$root = $_SERVER['DOCUMENT_ROOT']."/projects/bachelor/app/";

use app\DBHandler;
use app\interfaces\CRUD;


require_once $root."interface/CRUD.php";

class Cocktail extends CRUD
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

    public function readAll()
    {
    }
}

$cl = new Cocktail();
echo "----------- RESULT -----------".PHP_EOL;
print_r($cl->pdo); ECHO PHP_EOL;
echo "----------- RESULT -----------".PHP_EOL;

