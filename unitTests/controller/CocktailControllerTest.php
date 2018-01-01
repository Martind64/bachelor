<?php

namespace unitTests\controller;

require_once __DIR__."/../../app/controller/cocktail/CocktailController.php";
require_once __DIR__."/../../app/model/Cocktail.php";

use app\controller\cocktail\CocktailController;
use app\model\Cocktail;
use PHPUnit\Framework\TestCase;

class CocktailControllerTest extends TestCase
{
    /**
    * @test
    * @dataProvider letterProvider
    */
    public function getCocktailsStartingWith_variousLetters_arrayOfCocktails($letter, $expected, $data){
        $cocktailStub = $this->createMock(Cocktail::class);
        $cocktailStub->method('readAll')->willReturn($data);

        $controllerStub = $this->getMockBuilder(CocktailController::class)
                                ->disableOriginalConstructor()
                                ->setMethods(null)
                                ->getMock();
        $controllerStub->cocktail = $cocktailStub;
        $actual = $controllerStub->getCocktailsStartingWith($letter);
        $this->assertEquals($expected, $actual);
    }

    public function letterProvider(){
        return [
            'Lower case m' => [
                'letter'        => 'm',
                'expected'      =>  [
                                        ['name' => 'Mango Juice', 'description' => 'A description', 'recipe' => 'A recipe'],
                                        ['name' => 'Mojito', 'description' => 'A description', 'recipe' => 'A recipe'],
                                    ],
                'Data' =>
                    [
                        ['name' => 'filur', 'description' => 'A description', 'recipe' => 'A recipe', 'img_path' => 'img/to/path'],
                        ['name' => 'mojito', 'description' => 'A description', 'recipe' => 'A recipe'],
                        ['name' => 'mango Juice', 'description' => 'A description', 'recipe' => 'A recipe'],
                    ]
            ],
            'Lower case f' => [
                'letter'        => 'f',
                'expected'      =>  [
                                        ['name' => 'Fandango', 'description' => 'A description', 'recipe' => 'A recipe'],
                                        ['name' => 'Filur', 'description' => 'A description', 'recipe' => 'A recipe', 'img_path' => 'img/to/path'],
                                    ],
                'Data' =>
                    [
                        ['name' => 'filur', 'description' => 'A description', 'recipe' => 'A recipe', 'img_path' => 'img/to/path'],
                        ['name' => 'mojito', 'description' => 'A description', 'recipe' => 'A recipe'],
                        ['name' => 'fandango', 'description' => 'A description', 'recipe' => 'A recipe'],
                     ]
            ],
            'Capital case' => [
                'letter'        => 'M',
                'expected'      =>  [
                                        ['name' => 'Mango Joice', 'description' => 'A description', 'A recipe' => 'recipe'],
                                        ['name' => 'Mojito', 'description' => 'A description', 'A recipe' => 'recipe'],
                                    ],
                'Data' =>
                    [
                        ['name' => 'filur', 'description' => 'A description', 'A recipe' => 'recipe', 'img_path' => 'img/to/path'],
                        ['name' => 'mojito', 'description' => 'A description', 'A recipe' => 'recipe'],
                        ['name' => 'mango Joice', 'description' => 'A description', 'A recipe' => 'recipe'],
                    ]
        ],
            'Data with lower case name' => [
                'letter'        => 'M',
                'expected'      =>  [
                    ['name' => 'Mango Joice', 'description' => 'A description', 'A recipe' => 'recipe'],
                    ['name' => 'Mojito', 'description' => 'A description', 'A recipe' => 'recipe'],
                ],
                'Data' =>
                    [
                        ['name' => 'filur', 'description' => 'A description', 'A recipe' => 'recipe', 'img_path' => 'img/to/path'],
                        ['name' => 'mojito', 'description' => 'A description', 'A recipe' => 'recipe'],
                        ['name' => 'mango Joice', 'description' => 'A description', 'A recipe' => 'recipe'],
                    ]
            ],
            'Data with upper case name' => [
                'letter'        => 'M',
                'expected'      =>  [
                    ['name' => 'Mango Joice', 'description' => 'A description', 'recipe' => 'A recipe'],
                    ['name' => 'Mojito', 'description' => 'A description', 'recipe' => 'A recipe'],
                ],
                'Data' =>
                    [
                        ['name' => 'Filur', 'description' => 'A description', 'recipe' => 'A recipe', 'img_path' => 'img/to/path'],
                        ['name' => 'Mojito', 'description' => 'A description', 'recipe' => 'A recipe'],
                        ['name' => 'Mango Joice', 'description' => 'A description', 'recipe' => 'A recipe'],
                    ]
            ],
        ];
    }
}