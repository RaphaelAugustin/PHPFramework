<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 24/02/2015
 * Time: 10:23
 */

namespace PHPFramework\Utils;

use Symfony\Component\Yaml\Parser;

class Config {

    static function load($file) {
        $parser = new Parser();
        return $parser->parse(file_get_contents(ROOT_DIR.'/Src/Config/'.$file.'.yml'));
    }

}