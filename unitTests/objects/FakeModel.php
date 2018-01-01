<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/26/2017
 * Time: 2:35 PM
 */
namespace unitTests\objects;
require_once __DIR__."/../../app/model/Model.php";

use app\model\model;


class FakeCocktail extends Model
{
    public $name;
    public $description;
    public $recipe;
    public $imgPath;

}