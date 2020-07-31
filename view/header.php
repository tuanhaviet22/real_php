<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= (isset($title) ? $title : "Store") ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            padding-top: 3.5rem;
        }
    </style>
    <script>
        var base_url = "<?=home_base_url()?>";
    </script>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?= home_base_url() ?>">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($category) && !empty($category)): ?>
                <?php foreach ($category as $cate): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?= home_base_url() . "index.php?page=category&id=" . $cate['id'] ?>"><?= $cate['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="javacript:void(0)">Xin chào: <?= $_SESSION['user']['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= home_base_url() . "index.php?page=logout" ?>">Đăng xuất</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= home_base_url() . "index.php?page=cart" ?>">Giỏ hàng</a>
                </li>
            <?php else: ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Đăng kí
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <form class="px-4 py-3" style="width: 25rem">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Mật khẩu</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <button type="button" class="btn btn-primary register-btn">Đăng ký</button>
                        </form>
                    </div>
                </div>
                <div class="dropdown ml-3">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Đăng nhập
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <form class="px-4 py-3" style="width: 25rem">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="username_login">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Mật khẩu</label>
                                <input type="password" class="form-control" id="password_login">
                            </div>
                            <button type="button" class="btn btn-primary login-btn">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

        </ul>
        <form class="form-inline my-2 my-lg-0" style="position: relative">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" id="search" aria-label="Search">
            <div class="list-result" style="position: absolute;
    background: white;
    bottom: -85px;
    border: 1px solid #f2f2f2;
    width: 100%;display: none;">
            </div>
        </form>
    </div>
</nav>
