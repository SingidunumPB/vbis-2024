<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class ProductModel extends BaseModel
{
    public int $id;
    public string $name = '';
    public string $description = '';
    public int $price;

    public function tableName()
    {
        return "products";
    }

    public function readColumns()
    {
        return ["id", "name", "description"];
    }

    public function editColumns()
    {
        return ["name", "description"];
    }

    public function validationRules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "description" => [self::RULE_REQUIRED],
        ];
    }
}