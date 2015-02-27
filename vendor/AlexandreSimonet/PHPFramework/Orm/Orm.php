<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 17:21
 */

namespace PHPFramework\Orm;

use PHPFramework\Utils\Config;

class Orm {

    private $_Pdo;
    protected $QueryBuilder;

    function __construct() {
        if (empty(self::$Connection)) {
            $config = Config::load('Database');
            $this->_Pdo = new \PDO($config['driver'].':dbname='.$config['database'].';host='.$config['host'], $config['username'], $config['password']);
            $this->QueryBuilder = new \FluentPDO($this->_Pdo);
        }
    }

}