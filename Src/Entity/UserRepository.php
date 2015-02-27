<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 20:59
 */

namespace Src\Entity;


use PHPFramework\Orm\Repository;

class UserRepository extends Repository{
    public function find() {
        return $this->QueryBuilder->from('tweet')->select('users.*')->innerJoin('users')->fetchAll();
    }
}