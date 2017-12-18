<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/18/2017
 * Time: 5:16 PM
 */
namespace model;

$root = $_SERVER['DOCUMENT_ROOT']."/projects/bachelor/app/";

class Cocktail
{
    private $name;
    private $description;
    private $recipe;
    private $imgPath;

    public function __construct($name, $description, $recipe, $imgPath)
    {
        $this->name = $name;
        $this->description = $description;
        $this->recipe = $recipe;
        $this->imgPath = $imgPath;
    }
}
