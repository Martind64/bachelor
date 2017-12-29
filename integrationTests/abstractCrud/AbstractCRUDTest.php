<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/25/2017
 * Time: 11:33 PM
 */

require_once __DIR__.'/../../app/DBHandler.php';
require_once __DIR__."/../objects/Cocktail.php";

use integrationTests\objects\Cocktail;
use PHPUnit\Framework\TestCase;

class AbstractCRUDTest extends TestCase
{

    private $cocktail;

    public function setUp()
    {
        $this->cocktail = new Cocktail();
    }

    /**
     * @test
     */
    public function read_1_returnOneCocktail(){
        $cocktail = $this->cocktail->read(1);

        $count = count($cocktail);

        $this->assertEquals(1, $count);
    }

    /**
    * @test
    * @expectedException InvalidArgumentException
    */
    public function read_string_invalidArgumentException(){
        $this->cocktail->read("a string");
    }

    /**
    * @test
     * @expectedException InvalidArgumentException
    */
    public function read_decimal_invalidArgumentException(){
        $this->cocktail->read(1.10);

    }


}