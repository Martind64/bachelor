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
use PHPUnit\Framework\Constraint\IsFalse;
use Prophecy\Exception\InvalidArgumentException;

class AbstractCRUDHelper
{
    public function formatCreateSql(Model $class){
    }

    // Take CamelCase and replaces with snake case
    public function formatProperties(Model $class, $returnNullValueProperties = true){

        // Get the properties of the object
        $propertiesAndValues = get_object_vars($class);

        // If null value properties should not be returned, remove them from the array
        if (!$returnNullValueProperties){
            foreach ($propertiesAndValues as $property => $value){
                if ($value == null){
                    unset($propertiesAndValues[$property]);
                }
            }
        }

        // Throw exception if no data was provided
        if (empty($propertiesAndValues)){
            throw new InvalidArgumentException("You can not save ");
        }

        // Get the properties as values in the array instead
        $properties = array_keys($propertiesAndValues);

        // Foreach of the properties check for a capital letters and add an underscore instead
        foreach ($properties as $propertyKey => $property){
            // Take the first letter and make it lowercase
            $property = lcfirst($property);
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

    public function formatValues(Model $class){
        // Get the properties of the object
        $propertiesAndValues = get_object_vars($class);

        // Remove null value properties from the array
        foreach ($propertiesAndValues as $property => $value){
            if ($value == null){
                unset($propertiesAndValues[$property]);
            }
        }
        // Throw exception if no data was provided
        if (empty($propertiesAndValues)){
            throw new InvalidArgumentException("You can not save ");
        }

        // Get the properties as values in the array instead
        $fields = array_keys($propertiesAndValues);

        // Foreach of the properties check for a capital letters and add an underscore instead
        foreach ($fields as $propertyKey => $property){
            // Add a semicolon behind the property names so the can fit the VALUES part of the query
            $fields[$propertyKey] = ":".$property;
        }
        
        // Return properties as a comma separated string
        $fields = implode(", ",$fields);

        return $fields;
    }

    public function formatData(Model $class){
        // Get the properties of the object
        $propertiesAndValues = get_object_vars($class);

        // Remove null value properties from the array
        foreach ($propertiesAndValues as $property => $value){
            if ($value == null){
                unset($propertiesAndValues[$property]);
            }
        }

        // Throw exception if no data was provided
        if (empty($propertiesAndValues)){
            throw new InvalidArgumentException("You can not save ");
        }

        return $propertiesAndValues;

    }

}
