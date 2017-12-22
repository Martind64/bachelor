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


    /**
    * @test
    */
    public function formatProperties_validClass_correctlyFormattedProperties(){
        $cocktail = new Cocktail();
        $expectedProperties = "name, description, recipe, img_path";

        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }

}