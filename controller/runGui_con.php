<?php

/**
 * Created by PhpStorm.
 * User: 2
 * Date: 01.07.2016
 * Time: 13:51
 */
class runGui_con extends controller{
    function index(){
        header("charset=utf-8");
        require_once ("/macket/index.php");
    }
}