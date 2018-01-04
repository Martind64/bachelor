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

