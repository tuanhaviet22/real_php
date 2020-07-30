<?php


class HomeController{
    private $db;
    public function __construct(Database $db) {
        $this->db = $db;
    }
    function index(){
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($page)){
            $product = $this->db->readAll('product');
            $category = $this->db->readAll('category');
            $title = "Trang chủ";
            require "view/home.php";
        }else{
            switch ($page){
                case ($page=== 'product'):
                    $this->loadViewProduct();
                    break;
            }
        }

    }

    private function loadViewProduct()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $product = $this->db->getById('product',$id);
        $category = $this->db->readAll('category');
        $title = $product['name'];
        require 'view/detail-product.php';
    }
}