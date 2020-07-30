<?php require 'view/header.php'?>


<main role="main">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="image">
                    <img class="w-100" src="<?=home_base_url().$product['image']?>" alt="<?=$product['name']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="content">
                    <h1><?=$product['name']?></h1>
                        <div class="price">Giá : <strong><?=number_format($product['price'])?>đ</strong></div>
                        <?php if(!empty($product['price_sale'])): ?>
                            <div class="price">Giá KM : <strong class="text-danger"><?=number_format($product['price_sale'])?>đ</strong></div>
                        <?php endif; ?>
                        <p>Mô tả sản phẩm : <?=$product['description']?></p>

                        <div>
                            <button type="button" class="btn btn-info">Thêm vào giỏ hàng</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require "view/footer.php";
?>
