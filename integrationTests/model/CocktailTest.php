<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/18/2017
 * Time: 10:28 PM
 */

require_once "../../app/model/Cocktail.php";

use app\model\Cocktail;
use PHPUnit\Framework\TestCase;


class CocktailTest extends TestCase
{
    protected $cocktail;

    protected function setUp()
    {
        $this->stack = new Cocktail();
    }

    /**
     * @test
     */
    public function cocktailRead_1_returnOneCocktail(){
        $cocktail = new Cocktail();
        $singleCocktail = $cocktail->read(1);

        $count = count($singleCocktail);

        $this->assertEquals(1, $count);

    }

}