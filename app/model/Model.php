<?php

namespace app\model;
require_once __DIR__."/../interface/AbstractCRUD.php";

use app\helper\AbstractCRUDHelper;
use app\interfaces\AbstractCRUD;
use DateTime;

/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/20/2017
 * Time: 9:45 PM
 */

class model extends AbstractCRUD
{

    // Return the name of the DB table of the model
    public function getTableName(){
        // Get the class name with namespace
        $classWithNamespace = get_class($this);

        // Class includes namespace so get the class name which is after the last "\"
        $className = substr($classWithNamespace, strrpos($classWithNamespace, '\\') + 1);

        // Database tables are lower case
        $className = strtolower($className);

        return $className;
    }

}