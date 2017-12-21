<?php

namespace app\model;
require_once __DIR__."/../interface/AbstractCRUD.php";

use app\helper\AbstractCRUDHelper;
use app\interfaces\AbstractCRUD;

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
        $helper = new AbstractCRUDHelper();
        $table = $helper->getTableNameFromClass($this);
        return $table;
    }

}