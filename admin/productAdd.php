<?php
require "../view/admin/header.php";

$name = (!empty($product)) ? $product['name'] : "";
$category_id = (!empty($product)) ? $product['category_id'] : "";
$price = (!empty($product)) ? number_format($product['price'], 0) : "";
$price_sale = (!empty($product)) ? number_format($product['price_sale']) : "";
$desc = (!empty($product)) ? $product['description'] : "";
$image = (!empty($product)) ? $product['image'] : "";
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <?php if (isset($product) && !empty($product)): ?>
            <h1 class="h2">Chỉnh sửa sản phẩm: <?= $product['name'] ?></h1>
        <?php else: ?>
            <h1 class="h2">Thêm sản phẩm</h1>
        <?php endif; ?>
    </div>
    <div class="container">
        <?php if (!empty($product)): ?>
        <form method="POST" action="<?= home_base_url() ?>admin/index.php?page=product&method=edit&action=post&id=<?=$product['id']?>"
              enctype="multipart/form-data">
            <?php else: ?>
            <form method="POST" action="<?= home_base_url() ?>admin/index.php?page=product&method=create"
                  enctype="multipart/form-data">
                <?php endif; ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" value="<?= $name ?>" class="form-control" id="exampleInputEmail1" name="name"
                           aria-describedby="emailHelp" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Danh mục</label>
                    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                        <option value="0" disabled selected>Chọn</option>
                        <?php foreach ($category as $cate): ?>
                            <option <?=($category_id == $cate['id'] ? "selected" : "")?> value="<?=$cate['id']?>"><?=$cate['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="text" value="<?= $price ?>" class="form-control" name="price" id="price"
                           placeholder="Giá">
                </div>
                <div class="form-group">
                    <label for="price_sale">Giá KM</label>
                    <input type="text" value="<?= $price_sale ?>" class="form-control" name="price_sale"
                           id="price_sale" placeholder="Giá KM">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mô tả</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                              rows="3"><?= $desc ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <?php if (!empty($image)): ?>
                        <div><img src="<?= home_base_url() . $image ?>" style="width: 100px;" alt=""></div>
                    <?php endif; ?>
                    <input type="file" class="form-control-file" value="<?= home_base_url() . $image ?>" name="image"
                           id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</main>
<?php require "../view/admin/footer.php" ?>



