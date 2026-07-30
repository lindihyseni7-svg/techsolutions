<?php
namespace Admin\Lib;

class Session
{
    private $signedIn = false;
    public $puntoriId;
    public $message;

    public function __construct()
    {
        session_start();
        $this->checkLogin();
        $this->checkMessage();
    }

    public function isSignedIn()
    {
        return $this->signedIn;
    }

    public function checkLogin()
    {
        if (isset($_SESSION['puntoriId'])) {
            $this->puntoriId = $_SESSION['puntoriId'];
            $this->signedIn = true;
        } else {
            unset($this->puntoriId);
            $this->signedIn = false;
        }
    }
    public function login($user)
    {
        if ($user) {
            $this->puntoriId = $_SESSION['puntoriId'] = $user->getId();
            $this->signedIn = true;
        }
    }
    
    public function logout()
    {
        unset($_SESSION['puntoriId']);
        unset($this->puntoriId);
        $this->signedIn = false;
    }

    public function message($msg = "")
    {
        if (!empty($msg)) {
            $this->message = $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    public function checkMessage()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }
}
?>
