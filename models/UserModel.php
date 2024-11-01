<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class UserModel extends BaseModel
{
    public string $email;
    public string $firstName;
    public string $lastName;

    public function __construct()
    {
    }

    public function tableName()
    {
        return "users";
    }
}