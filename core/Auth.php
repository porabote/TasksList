<?php
namespace Core;

class Auth
{
    public function __construct()
    {
        session_start([
            'cookie_lifetime' => 86400,
        ]);
    }

    static private $user = [
        'username' => 'admin',
        'psw' => '123'
    ];

    static function check($data = []) {

        if(isset($_SESSION['username'])) return true;
        header("Location:/users/login/");
    }

    static function login($data) {

        if(self::$user['username'] == $data['username'] && self::$user['psw'] == $data['psw']) {

            $_SESSION['username'] = 'admin';
            header("Location:/tasks/index/");
        }
    }
}
?>