<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/18/2017
 * Time: 5:32 PM
 */
namespace app\interfaces;
require_once __DIR__."../../DBHandler.php";
require_once __DIR__."/../helper/AbstractCRUDHelper.php";

use app\DBHandler;

abstract class AbstractCRUD
{
    private $dbHandler;
    public function __construct()
    {
        $this->dbHandler = new DBHandler();
        // OLD FOR REPORT
//        $helper = new AbstractCRUDHelper();
//        $this->tableName = $helper->getClassName($model);
//        $hey = $this->getTable($model);
//        var_dump($hey);
    }

    public function create(){}

    public function read($id){
        $this->dbHandler->initializeConnection();
        // prepare the query
        $stmt = $this->dbHandler->pdo->prepare('SELECT * FROM '.$this->getTableName().' WHERE id = :id');
        // execute the query
        $stmt->execute(['id' => $id]);
        // Fetch all the data
        $entity = $stmt->fetchAll();
        return $entity;
    }

    public function update(){}

    public function delete(){}

    // Retrieve all data from a table
    public function readAll(){
        $this->dbHandler->initializeConnection();
        // prepare the query
        $stmt = $this->dbHandler->pdo->prepare('SELECT * FROM '.$this->getTableName());
//         execute the query
        $stmt->execute();
//         Fetch all the data
        $entities = $stmt->fetchAll();
        return $entities;
    }

}