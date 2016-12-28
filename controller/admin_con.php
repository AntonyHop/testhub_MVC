<?php

/**
 * Created by PhpStorm.
 * User: 2
 * Date: 01.07.2016
 * Time: 16:51
 */
class admin_con extends controller{
    function index(){
        require_once ("/macket/admin.php");
    }

    function getSitePages(){
        $pages = $this->db->getAll("SELECT * FROM pages");
        //debug($pages);
        header("Content-Type:application/json");
        echo json_encode($pages);
    }
    function  updatePage(){
        header("charset=utf-8");
        $answer = json_decode(file_get_contents('php://input'), true);
        if (isset($answer)){
            $sql  = "UPDATE pages SET name=?s, content=?s WHERE id=?i";
            $res = $this->db->query($sql,$answer['name'],$answer['content'],$answer['id']);
            if ($res == 1){
                $this->getSitePages();
            }
        }
    }
    function createPage(){
        $answer = json_decode(file_get_contents('php://input'), true);
        if (isset($answer)){
            $sql = "INSERT INTO pages (?n,?n) VALUES (?s,?s)";

            $res = $this->db->query($sql,"name","content",$answer['name'],$answer['content']);
             if ($res == 1){
                 $this->getSitePages();
             }
        }
    }

    function dellPage(){
        $answer = json_decode(file_get_contents('php://input'), true);
        if (isset($answer)){
            $sql = "DELETE FROM pages WHERE ?n=?i";

            $res = $this->db->query($sql,"id",$answer["id"]);
            if ($res == 1){
                $this->getSitePages();
            }
        }
    }


    function getAllTests(){
        $tests = $this->db->getAll("SELECT * FROM tests");

        $all_tests = new ArrayObject();

        $all_tests = $tests;

        foreach ($all_tests as $key=>$test){

            unset($all_tests[$key]["id_questions"]);
            $questions = $this->db->getAll("SELECT * FROM questions WHERE ?n = ?s","id_test",$test["id"]);
            $all_tests[$key]["questions"]= $questions;

            foreach ($questions as $iter=>$question){
                unset($all_tests[$key]["questions"][$keyb]["resp_id"]);
                    $resp = $this->db->getAll("SELECT * FROM resp WHERE ?n = ?s","id_questions",$question["id"]);
                    $all_tests[$key]["questions"][$iter]["resp"] = $resp ;
            }
        }


        echo json_encode($all_tests);
    }
}