<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class UserModel extends BaseModel
{
    public int $id;

    public string $email;
    public string $first_name;
    public string $last_name;

    public function __construct()
    {
    }

    public function tableName()
    {
        return "users";
    }

    public function readColumns()
    {
        return ["id", "email", "first_name", "last_name"];
    }

    public function editColumns()
    {
        return ["email", "first_name", "last_name"];
    }
}