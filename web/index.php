<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 23/01/2015
 * Time: 16:54
 */

    require '../vendor/autoload.php';

    define('ROOT_URL', str_replace('/index.php', '' , $_SERVER['SCRIPT_NAME']));
    define('BASE_URL', str_replace('/Web', '' , ROOT_URL));
    define('ROOT_DIR', str_replace('/web/index.php', '' , $_SERVER['SCRIPT_FILENAME']));

    $kernel = new PHPFramework\Kernel();

    echo "Je suis un pokemon";