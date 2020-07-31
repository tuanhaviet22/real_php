<?php

class AdminController{
    private $db;
    public function __construct(Database $db) {
        $this->db = $db;
    }

    function index(){
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($page)){
            if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                require "../admin/dashboard.php";
            }else{
                require "../admin/login.php";
            }
        }else{
            switch ($page){
                case ($page === 'product'):
                    $this->loadViewProduct();
                    break;
                case ($page === 'category'):
                    $this->loadViewCategory();
                    break;
                case ($page === 'order'):
                    $this->loadViewOrder();
                    break;
                case ($page === 'login'):
                    $this->loginAdmin();
                    break;
                case ($page === 'logout'):
                    $this->logoutAdmin();
                    break;
            }
        }

    }
    function loadViewCategory(){
        $method = filter_input(INPUT_GET, 'method', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!isset($method) && empty($method)){
            $data = $this->db->readAll('category');
            require "../admin/category.php";
        }else{
            switch ($method){
                case ($method === 'add'):
                    require "../admin/categoryAdd.php";
                    break;
                case ($method === "create"):
                    $this->addCategory();
                    break;
                case ($method === "edit"):
                    $this->editCategory();
                    break;
                case ($method==="delete"):
                    $this->deleteCategory();
                    break;
            }
        }
    }

    function loadViewProduct(){
        $method = filter_input(INPUT_GET, 'method', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($method)){
            $data = $this->db->readAll('product');
            $category = $this->db->readAll('category');
            require "../admin/product.php";
        }else{
            switch ($method){
                case ($method === 'add'):
                    $category = $this->db->readAll('category');
                    require "../admin/productAdd.php";
                    break;
                case ($method === "create"):
                    $this->addProduct();
                    break;
                case ($method === "edit"):
                    $this->editProduct();
                    break;
                case ($method==="delete"):
                    $this->deleteProduct();
                    break;
            }
        }
    }
    function deleteProduct(){
        $id = $_GET['id'];
        $del = $this->db->delete('product',$id);
        if ($del == true){
            header("Location:".home_base_url().'admin/index.php?page=product');
        }else{
//            Xoa khong thanh cong
        }
    }
    function addProduct(){
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
            'category_id' => $_POST['category_id']
        ];
        if(!empty($name) && !empty($price)){
            $insert = $this->db->create('product',$data);
            header("Location:".home_base_url().'admin/index.php?page=product');
        }else{
            header("Location:".home_base_url().'admin/index.php?page=product&method=add');
        }
        exit();
    }
    function editProduct(){
        $id = $_GET['id'];
        if(isset($_GET['action']) && $_GET['action'] == "post"){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $price_sale = $_POST['price_sale'];
            $description = $_POST['description'];
            $image = $this->uploadFile($_FILES['image']);
            $category_id = $_POST['category_id'];
            $data = [
                'name' => $name,
                'price' => $price,
                'price_sale' => $price_sale,
                'description' => $description,
                'image' => $image,
                'category_id' => $_POST['category_id']
            ];
            if ($image){
                $query = "UPDATE product SET name= '$name',price= '$price',price_sale= '$price_sale', description= '$description',image= '$image',category_id = $category_id WHERE id=$id";
                $sql = $this->db->runQuery($query);
                header("Location:".home_base_url().'admin/index.php?page=product');
                exit();
            }else{
                $query = "UPDATE product SET name= '$name',price= '$price',price_sale= '$price_sale', description= '$description',category_id = $category_id WHERE id=$id";
                $sql = $this->db->runQuery($query);
                header("Location:".home_base_url().'admin/index.php?page=product');
                exit();
            }

        }else{
            $category = $this->db->readAll('category');
            $product = $this->db->getById('product',$id);
            require "../admin/productAdd.php";
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

    private function addCategory()
    {
        $name = $_POST['name'];
        $data = [
            'name' => $name
        ];
        if(!empty($name)){
            $insert = $this->db->create('category',$data);
            header("Location:".home_base_url().'admin/index.php?page=category');
        }else{
            header("Location:".home_base_url().'admin/index.php?page=category&method=add');
        }
        exit();
    }

    private function editCategory(){
        $id = $_GET['id'];
        if(isset($_GET['action']) && $_GET['action'] == "post"){
            $name = $_POST['name'];
            if (!empty($name)){
                $query = "UPDATE category SET name= '$name' WHERE id=$id";
                $sql = $this->db->runQuery($query);
                header("Location:".home_base_url().'admin/index.php?page=category');
                exit();
            }else{

            }

        }else{
            $category = $this->db->getById('category',$id);
            require "../admin/categoryAdd.php";
        }
    }

    private function deleteCategory()
    {
        $id = $_GET['id'];
        $del = $this->db->delete('category',$id);
        if ($del == true){
            header("Location:".home_base_url().'admin/index.php?page=category');
        }else{
//            Xoa khong thanh cong
        }
    }

    private function loginAdmin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == "admin" && $password == "123456789"){
            $_SESSION['admin'] = true;
            header('Location: '.home_base_url().'admin');
        }
    }

    private function logoutAdmin()
    {
        $_SESSION['admin'] = null;
        header('Location: '.home_base_url().'admin');
    }

    private function loadViewOrder()
    {
        $method = filter_input(INPUT_GET, 'method', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($method)){
            $data = $this->db->readAll('order_product');
            foreach ($data as $key => $item){
                $id_user = $item['user_id'];
                $name = $this->db->getById('user',$id_user)['username'];
                $data[$key]['name_user'] = $name;
            }
            require '../admin/order.php';
        }else{
            $id = $_GET['id'];
            $this->db->delete('order_product',$id);
            header('Location: '.home_base_url().'admin/index.php?page=order');
            die;
        }

    }
}