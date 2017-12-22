<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/20/2017
 * Time: 8:22 PM
 */
namespace app\helper;
require_once __DIR__."/../interface/AbstractCRUD.php";
require_once __DIR__."/../model/Model.php";

use app\interfaces\AbstractCRUD;
use app\model\model;

class AbstractCRUDHelper
{
    public function formatCreateSql(Model $class){
    }

    // Take CamelCase and replaces with snake case
    public function formatProperties(Model $class){

        // Get the properties of the object
        $properties = get_object_vars($class);
        // Get the properties as values in the array instead
        $properties = array_keys($properties);

        // Foreach of the properties check for a capital letters and add an underscore instead
        foreach ($properties as $propertyKey => $property){
            // Put capital letters into an array called $matche
            if (preg_match_all("/[A-Z]/", $property, $matches)){
                //  Foreach of the matches add an underscore behind the capital letter
                foreach ($matches[0] as $key => $capitalLetter){
                    $properties[$propertyKey] = substr_replace($property, "_{$matches[0][$key]}", strpos($property, $matches[0][$key]), 1);
                }
            }
        }
        // Set all properties to lowercase before returning them
        $properties = array_map("strtolower", $properties);
        // Return properties as a comma separated string
        $properties = implode(", ",$properties);
        return $properties;

    }
}
