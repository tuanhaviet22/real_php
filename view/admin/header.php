<?php
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=home_base_url()?>/public/css/admin.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=home_base_url()?>">Trang chủ</a>
<!--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?=home_base_url().'admin/index.php?page=logout'?>">Đăng xuất</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?=(empty($page)) ? "active" : ""?>" href="index.php">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=($page === "order") ? "active" : ""?>" href="<?=home_base_url().'admin/index.php?page=order'?>">
                            <span data-feather="file"></span>
                            Đơn hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=($page === "product") ? "active" : ""?>" href="index.php?page=product">
                            <span data-feather="shopping-cart"></span>
                            Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=($page === "customer") ? "active" : ""?>" href="<?=home_base_url().'admin/index.php?page=customer'?>">
                            <span data-feather="users"></span>
                            Danh sách user
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=($page === "category") ? "active" : ""?>" href="index.php?page=category">
                            <span data-feather="layers"></span>
                            Danh mục
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
