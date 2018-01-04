<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__."/../../app/helper/AbstractCRUDHelper.php";
require_once __DIR__."/../objects/FakeModel.php";

use app\helper\AbstractCRUDHelper;
use unitTests\objects\FakeModel;

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
        $camelCaseProperties = new FakeModel();
        $camelCaseProperties->imgPath = "path/to/img";
        $firstLetterCapitalProperties = new FakeModel();
        $firstLetterCapitalProperties->Season = "";
        $snakeCaseProperties = new FakeModel();
        $snakeCaseProperties->last_name = "name";

        return [
            "camelCaseProperties" => [$camelCaseProperties, "name, description, recipe, img_path"],
            "firstLetterCapitalProperties" => [$firstLetterCapitalProperties, "name, description, recipe, season"],
            "snakeCaseProperties" => [$snakeCaseProperties, "name, description, recipe, last_name"]
        ];
    }

    /**
    * @test
    */
    public function formatProperties_returnNullValuePropertiesFalse_correctlyFormattedProperties(){
        $model = new FakeModel();
        $model->name = "Mojito";
        $model->description = "good";
        $expectedProperties = "name, description";
        $returnNullValues = FALSE;
        $actualProperties = $this->abstractCRUDHelper->formatProperties($model, $returnNullValues);

        $this->assertEquals($expectedProperties, $actualProperties);
    }
    // -------------------------- END FORMAT PROPERTIES --------------------------

    // -------------------------- FORMAT VALUES --------------------------
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function formatValues_classOnlyNullValuePropertiesCreate_invalidArgumentException(){
        $model = new FakeModel();

        $this->abstractCRUDHelper->formatValues($model, "create");
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
        $camelCaseProperties = new FakeModel();
        $camelCaseProperties->name = "Mojito";
        $camelCaseProperties->imgPath = "good drink";
        $firstLetterCapitalProperties = new FakeModel();
        $firstLetterCapitalProperties->Season = "summer";
        $snakeCaseProperties = new FakeModel();
        $snakeCaseProperties->name = "Mojito";
        $snakeCaseProperties->snake_case_property = "snake_case";

        return [
            "camelCase create action" => [$camelCaseProperties, "create", ":name, :imgpath"],
            "camelCase update action" => [$camelCaseProperties, "update", "name = :name, img_path = :imgpath"],
            "first letter capital create action" => [$firstLetterCapitalProperties, "create", ":season"],
            "first letter capital update action" => [$firstLetterCapitalProperties, "update", "season = :season"],
            "snake case create action" => [$snakeCaseProperties, "create", ":name, :snake_case_property"],
            "snake case update action" => [$snakeCaseProperties, "update", "name = :name, snake_case_property = :snake_case_property"],
        ];
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function formatValues_ClassNoPropertyValuesUpdate_invalidArgumentException(){
        $model = new FakeModel();
        $this->abstractCRUDHelper->formatValues($model, "update");
    }

    // -------------------------- END FORMAT VALUES --------------------------

    // -------------------------- FORMAT DATA --------------------------
    /**
    * @test
    */
    public function formatData_classWithData_correctlyFormattedData(){
        $model = new FakeModel();
        $model->name = "Mojito";
        $model->description = "Served cold";
        $model->recipe = "Contains ingredients";
        $expectedData = [
            "name" => "Mojito",
            "description" => "Served cold",
            "recipe" => "Contains ingredients"
        ];
        $actualData = $this->abstractCRUDHelper->formatData($model);
        $this->assertEquals($expectedData, $actualData);
    }
    // -------------------------- END FORMAT DATA --------------------------

}