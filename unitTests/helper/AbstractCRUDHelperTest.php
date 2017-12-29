<?php

use app\model\Cocktail;
use PHPUnit\Framework\TestCase;
require_once __DIR__."/../../app/helper/AbstractCRUDHelper.php";
require_once __DIR__."/../objects/CocktailTestObject.php";

use app\helper\AbstractCRUDHelper;
use unitTests\objects\CocktailTestObject;

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
    * @dataProvider propertyProvider
    */
    public function formatProperties_variousPropertyNames_correctlyFormattedProperties($cocktail, $expected){
        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expected, $actualProperties);
    }

    public function propertyProvider(){
        $cocktailCamelCaseProperties = new CocktailTestObject();

        $cocktailFirstLetterCapitalProperties = new CocktailTestObject();
        $cocktailFirstLetterCapitalProperties->Season = "";

        $cocktailWithSnakeCaseProperties = new CocktailTestObject();
        $cocktailWithSnakeCaseProperties->last_name = "name";

        return [
            "camelCaseProperties" => [$cocktailCamelCaseProperties, "name, description, recipe, img_path"],
            "firstLetterCapitalProperties" => [$cocktailFirstLetterCapitalProperties, "name, description, recipe, img_path, season"],
            "snakeCaseProperties" => [$cocktailWithSnakeCaseProperties, "name, description, recipe, img_path, last_name"]
        ];
    }

    /**
    * @test
    */
    public function formatProperties_returnNullValuePropertiesFalse_correctlyFormattedProperties(){
        $cocktail = new CocktailTestObject();
        $cocktail->name = "Mojito";
        $cocktail->description = "good";
        $expectedProperties = "name, description";
        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail, FALSE);

        $this->assertEquals($expectedProperties, $actualProperties);
    }


    /**
    * @test
    */
    public function formatProperties_classWithCamelCaseProperties_correctlyFormattedProperties(){
        $cocktail = new CocktailTestObject();
        $expectedProperties = "name, description, recipe, img_path";

        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }

    /**
     * @test
     */
    public function formatProperties_classWithFirstLetterCapitalProperties_correctlyFormattedProperties(){
        $cocktail = new CocktailTestObject();
        $cocktail->Season = "summer";
        $expectedProperties = "name, description, recipe, img_path, season";

        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }
    /**
     * @test
     */
    public function formatProperties_classWithSnakeCaseProperties_correctlyFormattedProperties(){
        $cocktail = new CocktailTestObject();
        $cocktail->last_name = "";
        $expectedProperties = "name, description, recipe, img_path, last_name";

        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expectedProperties, $actualProperties);
    }

    /**
     * @test
     */
    public function formatProperties_validClassReturnNullValuePropertiesFalse_correctlyFormattedProperties(){
        $cocktail = new CocktailTestObject();
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
    public function formatValues_classOnlyNullValuePropertiesCreate_invalidArgumentException(){
        $cocktail = new CocktailTestObject();

        $this->abstractCRUDHelper->formatValues($cocktail, "create");
    }

    /**
     * @test
     */
    public function formatValues_validClassCreate_correctlyFormattedValues(){
        $cocktail = new CocktailTestObject();
        $cocktail->name = "Mojito";
        $cocktail->description = "good drink";
        $expectedProperties = ":name, :description";

        $actualProperties = $this->abstractCRUDHelper->formatValues($cocktail, "create");

        $this->assertEquals($expectedProperties, $actualProperties);
    }

    /**
     * @test
     */
    public function formatValues_classWithFirstLetterCapitalPropertiesCreate_correctlyFormattedValues(){
        $cocktail = new CocktailTestObject();
        $cocktail->Season = "summer";
        $expectedProperties = ":season";

        $actualProperties = $this->abstractCRUDHelper->formatValues($cocktail, "create");

        $this->assertEquals($expectedProperties, $actualProperties);
    }
    /**
     * @test
     */
    public function formatValues_classWithSnakeCasePropertiesCreate_correctlyFormattedValues(){
        $cocktail = new CocktailTestObject();
        $cocktail->name = "Mojito";
        $cocktail->snake_case_property = "snake_case";
        $expectedProperties = ":name, :snake_case_property";

        $actualProperties = $this->abstractCRUDHelper->formatValues($cocktail, "create");

        $this->assertEquals($expectedProperties, $actualProperties);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function formatValues_ClassNoPropertyValuesUpdate_invalidArgumentException(){
        $cocktail = new CocktailTestObject();
        $this->abstractCRUDHelper->formatValues($cocktail, "update");
    }

    /**
    * @test
    */
    public function formatValues_updateValidClass_correctlyFormattedValues(){
        $cocktail = new CocktailTestObject();
        $cocktail->name = "Mojito";
        $cocktail->description = "good drink";
        $cocktail->imgPath = "path/to/img";
        $expectedProperties = "name = :name, description = :description, img_path = :imgpath";

        $actualProperties = $this->abstractCRUDHelper->formatValues($cocktail, "update");

        $this->assertEquals($expectedProperties, $actualProperties);
    }

    /**
    * @test
    */
    public function formatData_classWithData_correctlyFormattedDatta(){
        $cocktail = new CocktailTestObject();
        $cocktail->name = "Mojito";
        $cocktail->description = "Served cold";
        $cocktail->recipe = "Contains ingredients";
        $expectedData = [
            "name" => "Mojito",
            "description" => "Served cold",
            "recipe" => "Contains ingredients"
        ];
        $actualData = $this->abstractCRUDHelper->formatData($cocktail);
        $this->assertEquals($expectedData, $actualData);
    }


}