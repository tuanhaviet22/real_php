<?php require "../view/admin/header.php" ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Đơn hàng</h1>
    </div>
    <div class="container">
        <?php if(!empty($data)): ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên username</th>
                    <th scope="col">Sản phẩm</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $key => $value):
                    ?>
                    <tr style="border-bottom: 1px solid #f2f2f2">
                        <td><?=$key+1?></td>
                        <td><?=$value['name_user']?></td>
                        <td>
                            <?php
                            $handle = json_decode($value['order_data']);
                            foreach ($handle as $product):?>
                                <div class="item d-flex p-3 mb-3" style="border-bottom: 1px solid #f2f2f2">
                                    <div class="image">
                                        <img src="<?=home_base_url().$product->image?>" width="100" alt="">
                                    </div>
                                    <div class="desc pl-3">
                                        <div class="name"><?=$product->name?></div>
                                        <div class="price">Giá :<?=number_format($product->price)?>đ</div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </td>
                        <td class="d-flex justify-content-center">
                            <a class="d-block" href="<?=home_base_url()?>admin/index.php?page=order&method=delete&id=<?=$value['id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        <?php else: ?>
            <h3 class="text-danger">Không có dữ liệu</h3>
        <?php  endif; ?>
    </div>
</main>
<?php require "../view/admin/footer.php" ?>



