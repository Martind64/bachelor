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
    // -------------------------- FORMAT PROPERTIES --------------------------
    /**
    * @test
    * @dataProvider formatPropertiesProvider
    */
    public function formatProperties_variousPropertyNames_correctlyFormattedProperties($cocktail, $expected){
        $actualProperties = $this->abstractCRUDHelper->formatProperties($cocktail);

        $this->assertEquals($expected, $actualProperties);
    }

    public function formatPropertiesProvider(){
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
    // -------------------------- END FORMAT PROPERTIES --------------------------

    // -------------------------- FORMAT VALUES --------------------------
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
    * @dataProvider formatValueProvider
    */
    public function formatValues_variousProperties_correctlyFormattedValues($class,$action, $expectedValues){
        $actualValues = $this->abstractCRUDHelper->formatValues($class, $action);

        $this->assertEquals($expectedValues, $actualValues);
    }
    public function formatValueProvider(){
        $cocktailValidClass = new CocktailTestObject();
        $cocktailValidClass->name = "Mojito";
        $cocktailValidClass->imgPath = "good drink";
        $cocktailFirstLetterCapital = new CocktailTestObject();
        $cocktailFirstLetterCapital->Season = "summer";
        $cocktailSnakeCase = new CocktailTestObject();
        $cocktailSnakeCase->name = "Mojito";
        $cocktailSnakeCase->snake_case_property = "snake_case";

        return [
            "camelCase create action" => [$cocktailValidClass, "create", ":name, :imgpath"],
            "camelCase update action" => [$cocktailValidClass, "update", "name = :name, img_path = :imgpath"],
            "first letter capital create action" => [$cocktailFirstLetterCapital, "create", ":season"],
            "first letter capital update action" => [$cocktailFirstLetterCapital, "update", "season = :season"],
            "snake case create action" => [$cocktailSnakeCase, "create", ":name, :snake_case_property"],
            "snake case update action" => [$cocktailSnakeCase, "update", "name = :name, snake_case_property = :snake_case_property"],
        ];
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function formatValues_ClassNoPropertyValuesUpdate_invalidArgumentException(){
        $cocktail = new CocktailTestObject();
        $this->abstractCRUDHelper->formatValues($cocktail, "update");
    }

    // -------------------------- END FORMAT VALUES --------------------------

    // -------------------------- FORMAT DATA --------------------------
    /**
    * @test
    */
    public function formatData_classWithData_correctlyFormattedData(){
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
    // -------------------------- END FORMAT DATA --------------------------

}