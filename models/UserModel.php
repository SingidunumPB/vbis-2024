<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class UserModel extends BaseModel
{
    public int $id;

    public string $email = '';
    public string $first_name = '';
    public string $last_name = '';

    public function tableName(): string
    {
        return "users";
    }

    public function readColumns(): array
    {
        return ["id", "email", "first_name", "last_name"];
    }

    public function editColumns(): array
    {
        return ["email", "first_name", "last_name"];
    }

    public function validationRules(): array
    {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "first_name" => [self::RULE_REQUIRED],
            "last_name" => [self::RULE_REQUIRED],
        ];
    }
}