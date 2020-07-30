<?php


class HomeController{
    private $db;
    public function __construct(Database $db) {
        $this->db = $db;
    }
    function index(){
       require "view/home.php";
    }
}