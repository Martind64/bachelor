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
use Prophecy\Exception\InvalidArgumentException;

abstract class AbstractCRUD
{
    private $dbHandler;
    private $helper;
    public function __construct()
    {
        $this->dbHandler = new DBHandler();
        $this->helper = new AbstractCRUDHelper();
    }

    public function create(){

        // Prepare the fields and values for the query string
        $fields = $this->helper->formatProperties($this, FALSE);
        $values = $this->helper->formatValues($this, "create");
        $data = $this->helper->formatData($this);


        $this->dbHandler->initializeConnection();
        // prepare the query
        $stmt = $this->dbHandler->pdo->prepare("INSERT INTO {$this->getTableName()} ({$fields}) VALUES ($values)");
        // execute the query
        $stmt->execute($data);
    }

    public function read($id){
        if (!is_int($id)){
            throw new InvalidArgumentException("Read Method only accepts datatype int");
        }
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

    public function update($id){
        // Prepare the fields and values for the query string
        $fields = $this->helper->formatValues($this, "update");
        $data = $this->helper->formatData($this);
        // Add the id to the data array
        $data['id'] = $id;

        $this->dbHandler->initializeConnection();

        // prepare the query
        $stmt = $this->dbHandler->pdo->prepare("UPDATE {$this->getTableName()} SET {$fields} where id = :id");
        // execute the query
        $stmt->execute($data);
    }

    public function delete($id){}

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