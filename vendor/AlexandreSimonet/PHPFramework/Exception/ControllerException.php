<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 11:00
 */

namespace PHPFramework\Exception;


class ControllerException extends \Exception{

    function __construct($message) {
        die($message);
    }

}