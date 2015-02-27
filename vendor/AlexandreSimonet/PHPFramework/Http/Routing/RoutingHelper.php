<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 09:47
 */

namespace PHPFramework\Http\Routing;


class RoutingHelper {

    static function match($routes, &$Request) {
        foreach($routes as $key => $value) {
            $url = str_replace('/', '\/', $key);
            $url = '/'.$url.'/';
            $result = preg_match_all($url, $Request->Url, $matches, PREG_SET_ORDER );
            if ($result) {
                $Request->UrlOrigin = $key;
                $Request->Params = !empty($matches[0]) ? $matches[0] : null;
                return true;
            }
        }
    }

}