<?php


namespace Admin\Lib;





use PDO;

class Puntori extends Database
{
   

    protected $id;
    protected $emri;
    protected $mbiemri;
    protected $email;
    protected $fjalekalimi;
    protected $departamenti;
    protected $photoImage;

    protected static $db_table = "puntoret";
    protected static $db_tables_fields = ['emri', 'mbiemri', 'email', 'fjalekalimi', 'departamenti'];


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

    public function getFjalekalimi()
    {
        return $this->fjalekalimi;
    }

    public function setFjalekalimi($fjalekalimi): void
    {
        $this->fjalekalimi = $fjalekalimi;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getDepartamenti()
    {
        return $this->departamenti;
    }

    public function setDepartamenti($departamenti): void
    {
        $this->departamenti = $departamenti;
    }

    public function setPhotoImage($photoImage)
    {
        $this->photoImage = $photoImage;
    }

    public function getPhotoImage()
    {
        return $this->photoImage;
    }

    // public function create()
    // {
    //     try {
    //         $this->startupLoad($this->photoImage);
    //         $this->photo = $this->filename;
    //         $uploadFile = $this->uploadFile();
    //         if ($uploadFile) {
    //             parent::create();
    //         } else {
    //             foreach ($this->errors as $error) {
    //                 echo $error . "<br>";
    //             }
    //         }
    //     } catch (\Throwable  $e) {
    //         echo "Test" . $e->getMessage();
    //     }
    // }

    // public function update()
    // {
    //     try {
    //         if (isset($this->photoImage)) {
    //             $this->uploadfile = $this->src . $this->photo;
    //             unlink($this->uploadfile);
    //             $this->startupLoad($this->photoImage);
    //             $this->photo = $this->filename;
    //             $uploadFile = $this->uploadFile();
    //             if ($uploadFile) {
    //                 if (parent::update()) {
    //                     return true;
    //                 }
    //             } else {
    //                 foreach ($this->errors as $error) {
    //                     echo $error . "<br>";
    //                 }
    //             }
    //         } else {
    //             if (parent::update()) {
    //                 return true;
    //             }
    //         }
    //     } catch (\Throwable $e) {
    //         echo "User " . $e->getMessage();
    //     }
    // }

    // public function delete()
    // {
    //     try {
    //         if (parent::delete()) {
    //             $this->uploadfile = $this->src . $this->photo;
    //             unlink($this->uploadfile);
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     } catch (\Throwable $e) {
    //         echo "User " . $e->getMessage();
    //     }
    // }

    public function verifyPuntori($email, $fjalekalimi)
    {
        try {
            $sql = "SELECT * FROM puntoret WHERE email = :email LIMIT 1";
            $result = $this->prepare($sql);
            
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\Puntori");
            $puntori = $result->fetch();

            if (!$puntori) {
                return null;
            }

            $storedPassword = $puntori->getFjalekalimi();

            if (password_verify($fjalekalimi, $storedPassword) || hash_equals((string) $storedPassword, (string) $fjalekalimi)) {
                return $puntori;
            }

            return null;
        } catch (PDOException $e) {
            return null;
        }
    }
}
