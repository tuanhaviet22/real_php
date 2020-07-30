<?php require 'view/header.php'?>
<main role="main">
    <div class="container mt-5 mb-5">
        <div class="row">
            <?php if(isset($category) && !empty($category)): ?>
            <div class="col-md-3 col-12 border">
                <div class="text-center font-weight-bold">Danh mục</div>
                <ul class=" p-4">
                        <?php foreach ($category as $cate): ?>
                            <li>
                                <a href="#"><?=$cate['name']?></a>
                            </li>
                        <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="col-md-9 col-12 ">
                <div class="block border p-4">
                    <?php if(!empty($product)): ?>
                        <h3 class="text-center mb-3">Danh sách sản phẩm</h3>
                        <div class="row">
                            <?php foreach ($product as $item): ?>
                                <div class="col-md-6">
                                    <div class="item">
                                        <div class="image text-center">
                                            <a href="<?=home_base_url().'index.php?page=product&id='.$item['id']?>" class="d-block">
                                                <img width="300" height="300" src="<?=home_base_url().$item['image']?>" alt="<?=$item['name']?>">
                                            </a>
                                        </div>
                                        <div class="desc text-center">
                                            <a href="<?=home_base_url().'index.php?page=product&id='.$item['id']?>" style="font-size: 18px"><?=$item['name']?></a>
                                            <div class="price"><?=number_format($item['price'])?>đ</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <h3 class="text-center mb-3">Không có sản phẩm</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require "view/footer.php";
?>
