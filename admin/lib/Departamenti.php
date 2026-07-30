<?php

namespace Admin\Lib;

use PDO;
use PDOException;

 class Departamenti extends Database
{
    protected static $db_table = "departamentet";
    protected static $db_tables_fields = ['id', 'emri'];

    protected $id;
    protected $emri;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmri()
    {
        return $this->emri;
    }

    public function setEmri($emri)
    {
        $this->emri = $emri;
    }

}
