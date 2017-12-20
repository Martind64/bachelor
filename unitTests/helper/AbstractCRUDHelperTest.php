<?php

use app\model\Cocktail;
use PHPUnit\Framework\TestCase;
require_once __DIR__."/../../app/helper/AbstractCRUDHelper.php";
require_once __DIR__."/../../app/model/Cocktail.php";

use app\helper\AbstractCRUDHelper;

/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/20/2017
 * Time: 8:23 PM
 */

class AbstractCRUDHelperTest extends TestCase
{

    /** @var  $abstractCRUDHelper AbstractCRUDHelper */
    protected $abstractCRUDHelper;

    protected function setUp()
    {
        $this->abstractCRUDHelper = new AbstractCRUDHelper();
    }
    // NOT USED CAN BE USED IN REPORT?
//    /**
//    * @test
//    * @expectedException TypeError
//    */
//    public function getClassName_integer_invalidArgumentException(){
//        $this->abstractCRUDHelper->getClassName(10);
//        $this->expectException(TypeError::class);
//    }

    /**
    * @test
    */
    public function getClassName_validModel_className(){
        $cocktail = new Cocktail();
        $result = $this->abstractCRUDHelper->getClassName($cocktail);
        $this->assertEquals('cocktail', $result);
    }

}