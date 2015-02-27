<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 09:42
 */

namespace PHPFramework\Http\Routing;

use PHPFramework\Utils\Config;


class Router {

    private $_Route;

    function __construct() {
        $this->_Route = Config::load('Routing');
    }

    public function parse(&$Request) {
        if (RoutingHelper::match($this->_Route, $Request)) {
            $this->getInfos($Request);
            return true;
        } else {
            return false;
        }
    }

    private function getInfos(&$Request) {
        $Request->Controller = $this->_Route[$Request->UrlOrigin]['controller'];
        $Request->Action = $this->_Route[$Request->UrlOrigin]['action'];
        $Request->Secure = $this->_Route[$Request->UrlOrigin]['secure'];
        return true;
    }

}