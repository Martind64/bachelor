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

abstract class AbstractCRUD
{
    private $dbHandler;
    private $helper;
    public function __construct()
    {
        $this->dbHandler = new DBHandler();
        $this->helper = new AbstractCRUDHelper();
    }

    public function create(){}

    public function read($id){
        $fields = $this->helper->formatProperties($this);

        $this->dbHandler->initializeConnection();
        // prepare the query
        $stmt = $this->dbHandler->pdo->prepare("SELECT {$fields} FROM {$this->getTableName()} WHERE id = :id");
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
        $fields = $this->helper->formatProperties($this);
        // prepare the query
        $stmt = $this->dbHandler->pdo->prepare("SELECT $fields FROM {$this->getTableName()}");
        // execute the query
        $stmt->execute();
        // Fetch all the data
        $entities = $stmt->fetchAll();
        return $entities;
    }

}