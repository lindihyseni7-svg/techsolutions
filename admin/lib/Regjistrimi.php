<?php

namespace Admin\Lib;

use PDO;
use PDOException;

class Regjistrimi extends Database
{
    public static $db_table = "regjistrimet"; 
    public static $db_table_fields = ['id', 'Data', 'Ora_Hyrjes', 'Ora_Daljes']; 
    
    protected $id;
    protected $Data;
    protected $Ora_Hyrjes;
    protected $Ora_Daljes;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getData()
    {
        return $this->Data;
    }

    public function setData($Data)
    {
        $this->Data = $Data;
    }

    public function getOraHyrjes()
    {
        return $this->Ora_Hyrjes;
    }

    public function setOraHyrjes($Ora_Hyrjes)
    {
        $this->Ora_Hyrjes = $Ora_Hyrjes;
    }

    public function getOraDaljes()
    {
        return $this->Ora_Daljes;
    }

    public function setOraDaljes($Ora_Daljes)
    {
        $this->Ora_Daljes = $Ora_Daljes;
    }
}
