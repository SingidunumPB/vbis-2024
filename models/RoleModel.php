<?php

namespace app\models;

use app\core\BaseController;
use app\core\BaseModel;

class RoleModel extends BaseModel
{
    public int $id;
    public string $name;

    public function tableName()
    {
        return 'roles';
    }

    public function readColumns()
    {
        return ['id', 'name'];
    }

    public function editColumns()
    {
        return ['name'];
    }

    public function validationRules()
    {
        return [
            "name" => [self::RULE_REQUIRED]
        ];
    }
}