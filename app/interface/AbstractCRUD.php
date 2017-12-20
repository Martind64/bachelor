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
use app\helper\AbstractCRUDHelper;

abstract class AbstractCRUD extends DBHandler
{
    private $tableName;
    public function __construct($model)
    {
        $helper = new AbstractCRUDHelper();
        $this->tableName = $helper->getClassName($model);
    }

    public function create(){}

    public function read($id){
        $this->initializeConnection();
        // prepare the query
        $stmt = $this->pdo->prepare('SELECT * FROM '.$this->tableName.' WHERE id = :id');
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
        $this->initializeConnection();
        // prepare the query
        $stmt = $this->pdo->prepare('SELECT * FROM '.$this->tableName);
        // execute the query
        $stmt->execute();
        // Fetch all the data
        $entities = $stmt->fetchAll();
        return $entities;
    }

}