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
                case ($page === "category"):
                    $this->loadViewCategory();
                    break;
                case ($page === 'register'):
                    $this->registerUser();
                    break;
                case ($page === 'login'):
                    $this->loginUser();
                    break;
                case ($page === 'logout'):
                    $this->logoutUser();
                    break;
                case ($page === 'cart'):
                    $this->cart();
                    break;
                case ($page === 'addToCart'):
                    $this->addToCart();
                    break;
                case ($page === "payment"):
                    $this->payment();
                    break;
                case ($page === "search"):
                    $this->search();
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

    private function loadViewCategory()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $category = $this->db->readAll('category');
        $product = $this->db->_getById('product','category_id',$id);
        $title = $this->db->getById('category',$id)['name'];
        require "view/home.php";
    }

    private function registerUser()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)){
            echo json_encode([
                'success' => false
            ]);
            die;
        }
        $data = [
            'username' => $username,
            'password' => md5($password)
        ];
        $this->db->create('user',$data);
        echo json_encode([
           'success' => true
        ]);
        die;
    }

    private function loginUser()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)){
            echo json_encode([
                'success' => false
            ]);
            die;
        }
        $find = $this->db->_getById('user','username',$username)[0];
        if(!empty($find)){
            if (md5($password) == $find['password']){
                $_SESSION['user'] = [
                    'id' => $find['id'],
                    'username'=> $find['username']
                ];
                echo json_encode([
                    'success' => true
                ]);
                die;
            }else{
                echo json_encode([
                    'success' => false
                ]);
                die;
            }
        }else{
            echo json_encode([
                'success' => false
            ]);
            die;
        }
    }

    private function logoutUser()
    {
        session_unset();
        header("Location: ".home_base_url());
    }

    private function cart()
    {
//        session_unset();
        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : "";
        $data = [];
        if(!empty($cart)){
            foreach ($cart as $key => $item){
                $id = $item['id'];
                $product = $this->db->getById('product',$id);
                array_push($data,$product);
            }
        }
        $_SESSION['hidden_cart'] = $data;
        $category = $this->db->readAll('category');
        require 'view/cart.php';
    }

    private function addToCart()
    {
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        $name = $_POST['id'];
        $data = [
            'id' => $id,
            'qty' => $qty
        ];
        $cart = $_SESSION['cart'];
        if (!empty($cart)){
            array_push($cart,$data);
            $_SESSION['cart'] = $cart;
        }else{
            $_SESSION['cart'] = [$data];
        }

        echo json_encode([
            'success' => true
        ]);
        die;
    }

    private function payment()
    {
        $data = (isset($_SESSION['hidden_cart'])) ? $_SESSION['hidden_cart'] : "";
        if (!empty($data)){
            $id = $_SESSION['user']['id'];
            $handle = json_encode($data);
            $query = "INSERT INTO `order_product` (`user_id`, `order_data`) VALUES ( $id, "."'".$handle."'".")";
            $this->db->runQuery($query);
            $_SESSION['hidden_cart'] = null;
            $_SESSION['cart'] = null;
            require 'view/success.php';
        }
    }

    private function search()
    {
        $param = $_POST['search'];
        $data = $this->db->search($param);
        echo json_encode([
           'data' => $data
        ]);
    }
}