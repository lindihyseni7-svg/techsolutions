<?php

namespace Admin\Lib;

use PDO;

class Kontakti extends Database
{
    // Fushat e klasës që përputhen me tabelën "kontakti"
    protected $id;
    protected $emri;
    protected $mbiemri;
    protected $email;
    protected $mesazhi;
    protected $departamenti;

    // Tabela e bazës së të dhënave dhe fushat për shtim
    protected static $db_table = "kontaktet";
    protected static $db_tables_fields = ['emri', 'mbiemri', 'email', 'mesazhi', 'departamenti'];

    // Metodat për marrjen dhe vendosjen e vlerave
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getEmri()
    {
        return $this->emri;
    }

    public function setEmri($emri): void
    {
        $this->emri = $emri;
    }

    public function getMbiemri()
    {
        return $this->mbiemri;
    }

    public function setMbiemri($mbiemri): void
    {
        $this->mbiemri = $mbiemri;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getMesazhi()
    {
        return $this->mesazhi;
    }

    public function setMesazhi($mesazhi): void
    {
        $this->mesazhi = $mesazhi;
    }

    public function getDepartamenti()
    {
        return $this->departamenti;
    }

    public function setDepartamenti($departamenti): void
    {
        $this->departamenti = $departamenti;
    }

   
}
