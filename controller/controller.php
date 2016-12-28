<?php

/**
 * Created by PhpStorm.
 * User: 2
 * Date: 01.07.2016
 * Time: 14:55
 */
class controller extends god{
    
    public $db;
    protected  $core;
    

    function __construct(){
        $this->db = new SafeMySQL();
    }

    function render(){
        echo "<h1>Тут будет шаблонизатор</h1>";
    }

}