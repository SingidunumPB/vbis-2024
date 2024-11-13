<?php

namespace app\models;

use app\core\BaseController;
use app\core\BaseModel;

class UserRoleModel extends BaseModel
{
    public int $id;
    public int $id_user;
    public int $id_role;

    public function tableName()
    {
        return 'user_roles';
    }

    public function readColumns()
    {
        return ['id', 'id_user', 'id_role'];
    }

    public function editColumns()
    {
        return ['id_user', 'id_role'];
    }

    public function validationRules()
    {
        return [
            "id_user" => [self::RULE_REQUIRED],
            "id_role" => [self::RULE_REQUIRED]
        ];
    }
}