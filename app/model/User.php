<?php
/**
 * Created by PhpStorm.
 * User: Delfs
 * Date: 12/21/2017
 * Time: 4:11 PM
 */
namespace app\model;
require_once __DIR__."/Model.php";

class User extends Model
{
    public $sirName;
    public $lastName;
    public $password;

    public function __construct()
    {
        parent::__construct($this);
    }

}


