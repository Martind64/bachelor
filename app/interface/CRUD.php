<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/18/2017
 * Time: 5:32 PM
 */
namespace app\interfaces;
$root = $_SERVER['DOCUMENT_ROOT']."/projects/bachelor/app/";

require_once $root."DBHandler.php";

use app\DBHandler;

abstract class CRUD extends DBHandler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create(){}
    public function read(){}
    public function update(){}
    public function delete(){}
    public function readAll(){}

}