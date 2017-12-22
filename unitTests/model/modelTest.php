<?php

use app\model\Cocktail;
use PHPUnit\Framework\TestCase;
require_once __DIR__."/../../app/model/Model.php";
require_once __DIR__."/../../app/model/Cocktail.php";

/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/22/2017
 * Time: 11:45 PM
 */

class modelTest extends TestCase
{
    /**
    * @test
    */
    public function getTableName_validModel_classNameAsString(){
        $cocktail = new Cocktail();
        $result = $cocktail->getTableName($cocktail);
        $this->assertEquals('cocktail', $result);
    }
}