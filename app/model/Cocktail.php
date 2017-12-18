<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/18/2017
 * Time: 5:16 PM
 */
namespace app\model;
require_once __DIR__."/../interface/AbstractCRUD.php";

use app\interfaces\AbstractCRUD;


class Cocktail extends AbstractCRUD
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

