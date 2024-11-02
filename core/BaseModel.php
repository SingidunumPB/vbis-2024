<?php

namespace app\core;

abstract class BaseModel
{
    abstract public function tableName();

    public function get()
    {
        $db = new DbConnection();
        $con = $db->connect();
        $tableName = $this->tableName();
        $query = "select * from  $tableName limit 1";

        $dbResult = $con->query($query);
        return  $dbResult->fetch_assoc();
    }

    public function mapData($data)
    {
        if ($data != null) {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key))
                    $this->{$key} = $value;
            }
        }
    }
}