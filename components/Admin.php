<?php
namespace components;
use models\People;
use models\Links;
/**
 * @uses ExceptionHandler
 */
class Admin{

    private static $pid = 0;
    private static $admin = [];

    public function __construct() {
        $people = new People();
        $people->customSearch = [
            'id' => [
                '=' => self::getPID()
            ]
        ];
        if(isset($_POST['login'])){
            $people->customSearch = [
                'password' => [
                    '=' => md5($_POST['password'])
                ],
                'email' => [
                    '=' => $_POST['email']
                ]
            ];
            $pid = md5(md5($_POST['password']).$_POST['email'].time());

        }elseif(isset($_COOKIE['pid'])){
            $people->customSearch = [
                'sid' => [
                    '=' => $_COOKIE['pid']
                ]
            ];

            $pid = $_COOKIE['pid'];
        }

        if($pdata = $people->find()){
            $people->id = $pdata[0]['id'];
            $people->sid = $pid;
            if(isset($_POST['login']))
                $people->update();
            self::setAdmin($pdata[0]);
            self::setPid($pid);
        }
    }

    public static function getPID() : string {
        return self::$pid;
    }

    public static function getLinks() : array {
        $links = new Links();
        $links->customSearch = [
            'pid' => [
                    '=' => self::getAdmin()['id']
                ]
        ];

        return $links->find();
    }

    private static function setAdmin($admin) {
        self::$admin = $admin;
    }

    public static function getAdmin() : array {
        return self::$admin;
    }

    /**
     * @return void
     */
    private static function setPID($pid) : string {
        setcookie('pid', $pid);

        self::$pid = $pid;
        return $pid;
    }
}