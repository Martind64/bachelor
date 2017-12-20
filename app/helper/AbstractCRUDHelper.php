<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/20/2017
 * Time: 8:22 PM
 */
namespace app\helper;
require_once __DIR__."/../interface/AbstractCRUD.php";

use app\interfaces\AbstractCRUD;

class AbstractCRUDHelper
{
    public function getClassName(AbstractCRUD $class){
        // Get the class name with namespace
        $classWithNamespace = get_class($class);

        // Class name taken after the last "\"
        $className = substr($classWithNamespace, strrpos($classWithNamespace, '\\') + 1);

        // Database tables are lower case
        $className = strtolower($className);

        return $className;
    }
}


