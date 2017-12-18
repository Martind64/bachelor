<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/18/2017
 * Time: 5:16 PM
 */
namespace app\model;
$root = $_SERVER['DOCUMENT_ROOT']."/projects/bachelor/app/";
require_once $root."interface/CRUD.php";

use app\interfaces\CRUD;


class CocktailModel extends CRUD
{
    private $name;
    private $description;
    private $recipe;
    private $imgPath;

    public function __construct()
    {
        // Set the table name in the constructor
        parent::__construct("cocktail");
    }
}

