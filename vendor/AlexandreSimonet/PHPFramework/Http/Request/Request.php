<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 09:40
 */

namespace PHPFramework\Http\Request;


class Request {

    public $Url; // User URL
    public $Controller;
    public $Action;
    public $Params;

    public $Method;

    public $Post;

    public function __construct() {
        $this->Url = str_replace(str_replace(' ', '%20', BASE_URL), '', $_SERVER['REQUEST_URI']);
        $this->Method = $_SERVER['REQUEST_METHOD'];
        if ($this->Method == 'POST') {
            $this->Post = $_POST;
        }
    }

}