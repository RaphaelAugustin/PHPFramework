<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 11:23
 */

namespace PHPFramework\Controller;


use PHPFramework\Exception\ControllerException;
use PHPFramework\Orm\Orm;

abstract class Controller
{

    protected $Request;
    public $Layout = 'layout';
    protected $Orm;

    public function __construct(&$Request) {
        $this->Request = $Request;
        $this->Orm = new Orm();
    }

    public function render($ressources, $params = []) {
        $view = ROOT_DIR.'/Src/Ressources/Views/'.$ressources.'.php';
        if (file_exists($view)) {
            ob_start();
            extract($params);
            require_once $view;
            $content_for_layout = ob_get_clean();
            require_once ROOT_DIR.'/Src/Ressources/'.$this->Layout.'.php';
        } else {
            throw new ControllerException('Views '.$ressources.' not found');
        }
    }
}