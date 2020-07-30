<?php require "../view/admin/header.php" ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Sản phẩm</h1>
        <a href="index.php?page=product&method=add" class="btn btn-primary btn-lg active" role="button"
           aria-pressed="true">Thêm sản phẩm</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên</th>
                <th scope="col">Danh mục</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Thao tác</th>

            </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $value): ?>
                    <tr style="border-bottom: 1px solid #f2f2f2">
                        <td><?=$value['id']?></td>
                        <td><?=$value['name']?></td>
                        <td><?=$value['category_id']?></td>
                        <td>
                            <img style="width: 100px" src="<?=home_base_url().$value['image']?>" alt="<?=$value['name']?>">
                        </td>
                        <td><?=$value['price']?>đ</td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php require "../view/admin/footer.php" ?>



