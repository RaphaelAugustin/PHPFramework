<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 11:20
 */

namespace Src\Controller;


use PHPFramework\Controller\Controller;

class DefaultController extends Controller {

    function index() {
        return $this->render('Test/test', []);
    }

}