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
    public function formatProperties_classWithCamelCaseProperties_correctlyFormattedProperties(){
        $cocktail = new Cocktail();
        $expectedProperties = "name, description, recipe, img_path";

        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }

    /**
     * @test
     */
    public function formatProperties_classWithFirstLetterCapitalProperties_correctlyFormattedProperties(){
        $cocktail = new Cocktail();
        $cocktail->Season = "summer";
        $expectedProperties = "name, description, recipe, img_path, season";

        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }
    /**
     * @test
     */
    public function formatProperties_classWithSnakeCaseProperties_correctlyFormattedProperties(){
        $cocktail = new Cocktail();
        $cocktail->last_name = "";
        $expectedProperties = "name, description, recipe, img_path, last_name";

        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }

    /**
     * @test
     */
    public function formatProperties_validClassReturnNullValuePropertiesFalse_correctlyFormattedProperties(){
        $cocktail = new Cocktail();
        $cocktail->name = "Mojito";
        $cocktail->description = "A cold summer drink";
        $expectedProperties = "name, description";

        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail, false);

        $this->assertEquals($expectedProperties, $actualProperties);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function formatValues_classOnlyNullValueProperties_correctlyFormattedProperties(){
        $cocktail = new Cocktail();

        $this->abstractCRUDHelper->formatValues($cocktail);
    }

    /**
     * @test
     */
    public function formatValues_classWithFirstLetterCapitalProperties_correctlyFormattedProperties(){
        $cocktail = new Cocktail();
        $cocktail->Season = "summer";
        $expectedProperties = ":Season";

        $actualProperties = $this->abstractCRUDHelper->formatValues($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }
    /**
     * @test
     */
    public function formatValues_classWithSnakeCaseProperties_correctlyFormattedProperties(){
        $cocktail = new Cocktail();
        $cocktail->name = "Mojito";
        $cocktail->description = "good drink";
        $expectedProperties = ":name, :description";

        $actualProperties = $this->abstractCRUDHelper->formatValues($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }
}