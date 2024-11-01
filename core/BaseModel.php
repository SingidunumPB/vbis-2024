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
        $user = $dbResult->fetch_assoc();

        $this->email = $user['email'];
        $this->firstName = $user['first_name'];
        $this->lastName = $user['last_name'];
    }
}