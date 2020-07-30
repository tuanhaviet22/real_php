<?php

class AdminController{
    private $db;
    public function __construct(Database $db) {
        $this->db = $db;
    }

    function index(){
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($page)){
            require "../admin/dashboard.php";
        }else{
            switch ($page){
                case ($page === 'product'):
                    $this->loadViewProduct();
                    break;
            }
        }

    }

    function loadViewProduct(){
        $method = filter_input(INPUT_GET, 'method', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($method)){
            $data = $this->db->readAll('product');
            require "../admin/product.php";
        }else{
            switch ($method){
                case ($method === 'add'):
                    require "../admin/productAdd.php";
                    break;
                case ($method === "create"):
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $price_sale = $_POST['price_sale'];
                    $description = $_POST['description'];
                    $image = $this->uploadFile($_FILES['image']);
                    $data = [
                        'name' => $name,
                        'price' => $price,
                        'price_sale' => $price_sale,
                        'description' => $description,
                        'image' => $image,
                        'category_id' => 1
                    ];
                    $insert = $this->db->create('product',$data);
                    header("Location: http://localhost/php/admin/index.php?page=product");
                    exit();
                    break;
            }
        }
    }

    function uploadFile($file){
        $target_dir = dirname(__DIR__)."/public/uploads/";
        $target_file = $target_dir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target_file)){
            return "/public/uploads/".$file["name"];
        }
        return false;
    }
}