<?php
namespace app\controller\cocktail;
require_once __DIR__."/../../model/Cocktail.php";
require_once __DIR__."/../../model/model.php";


use app\model\Cocktail;
use app\model\model;

class CocktailController
{
    public $cocktail;

    public function __construct()
    {
        $this->cocktail = new Cocktail();
    }

    public function getCocktailsStartingWith($letter){
        $cocktails = $this->cocktail->readAll();

        // set the letter to lowercase so method can take capital case letters
        $letter = strtolower($letter);

        $cocktailsStartingWithLetter = [];

        // Foreach cocktail starting with the given letter put the cocktail into the array that should be returned
        foreach ($cocktails as $key => $cocktail) {
            // set the first letter to lower case so it can match the $letter
            $cocktail['name'] = lcfirst($cocktail['name']);
            if (substr($cocktail['name'], 0, 1) == $letter){
                $cocktail['name'] = ucfirst($cocktail['name']);
                $cocktailsStartingWithLetter[] = $cocktail;
            }
        }

        // Sort the array
        sort($cocktailsStartingWithLetter);

        return $cocktailsStartingWithLetter;
    }

}

