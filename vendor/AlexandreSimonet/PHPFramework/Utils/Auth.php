<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 27/02/2015
 * Time: 14:55
 */

namespace PHPFramework\Utils;


class Auth {

    static function routeAccess(&$Request){
        if ($Request->Secure) {
            if (!empty($_SESSION['id'])) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

}