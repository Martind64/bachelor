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
    private $tableName;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        parent::__construct();
    }

    public function create(){}
    public function read(){}
    public function update(){}
    public function delete(){}

    // Retrieve all data from a table
    public function readAll(){
        // prepare the query
        $stmt = $this->pdo->prepare('SELECT * FROM '.$this->tableName);
        // execute the query
        $stmt->execute();
        // Fetch all the data
        $entities = $stmt->fetchAll();
        return $entities;
    }

}