<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 09:33
 */

namespace PHPFramework;

use PHPFramework\Exception\ControllerException;
use PHPFramework\Http\Request\Request;
use PHPFramework\Http\Routing\Router;
use PHPFramework\Exception\RoutingException;
use PHPFramework\Utils\Auth;

class Kernel {

    private $_environement;
    private $_Request;
    private $_Router;

    public function __construct($environement) {
        session_start();
        $this->_environement = $environement;
        $this->_Request = new Request();
        $this->_Router = new Router();
        if ($this->_Router->parse($this->_Request)) {
            if  (Auth::routeAccess($this->_Request)) {
                $controller =  $this->loadController();
                if (method_exists($controller, $this->_Request->Action)) {
                    call_user_func_array([$controller, $this->_Request->Action], [$this->_Request->Params]);
                } else {
                    throw new RoutingException('Action <b>'.$this->_Request->Action.'</b> undefined in controller <b>'.$this->_Request->Controller.'</b>');
                }
            } else {
                throw new RoutingException('Permission denied');
            }
        } else {
            throw new RoutingException('Route not found');
        }
    }


    public function loadController() {
        $name = ucfirst($this->_Request->Controller).'Controller';
        $file = ROOT_DIR.'/Src/Controller/'.$name.'.php';
        $namespace = 'Src\\Controller\\'.$name;
        if (file_exists($file)) {
            return new $namespace($this->_Request);
        } else {
            throw new ControllerException('Controller '.$name.' not found');
        }
    }

}