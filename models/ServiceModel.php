<?php

namespace app\models;

use app\core\BaseModel;

class ServiceModel extends BaseModel
{
    public int $id;
    public string $name = '';
    public string $location = '';
    public string $salon_name = '';
    public string $service_name = '';
    public $image_name = '';

    public function tableName()
    {
        return 'services';
    }

    public function readColumns()
    {
        return ['id', 'location', 'salon_name', 'service_name', 'image_name'];
    }

    public function editColumns()
    {
        return ['location', 'salon_name', 'service_name', 'image_name'];
    }

    public function validationRules()
    {
        return [
            'location' => [self::RULE_REQUIRED],
            'salon_name' => [self::RULE_REQUIRED],
            'service_name' => [self::RULE_REQUIRED]
        ];
    }
}