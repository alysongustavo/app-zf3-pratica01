<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 23/03/2018
 * Time: 21:31
 */

namespace Blog;

class Module
{

    public function getConfig(){
        return include __DIR__ . '/../config/module.config.php';
    }
}