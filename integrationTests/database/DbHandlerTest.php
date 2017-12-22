<?php

require_once __DIR__.'/../../app/DBHandler.php';
use app\DBHandler;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/21/2017
 * Time: 9:07 AM
 */

class DbHandlerTest extends TestCase
{
    /**
    * @test
    */
    public function initializeConnection_whenCalled_changedPDOProperty(){
        $dbHandler = new DBHandler();

        $firstStateOfProperty = $dbHandler->pdo;
        $dbHandler->initializeConnection();
        $propertyStateAfterMethodIsCalled = $dbHandler->pdo;

        $this->assertNotEquals($firstStateOfProperty, $propertyStateAfterMethodIsCalled);
    }

    /**
    * @test
    */
    public function initializeConnection_whenCalled_pdoPropertyIsPdoObject(){
        $dbHandler = new DBHandler();
        $dbHandler->initializeConnection();

        $expectedPdoObject = PDO::class;

        $this->assertInstanceOf($expectedPdoObject, $dbHandler->pdo);
    }

}