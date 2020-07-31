<?php require 'view/header.php'?>

<main>
    <div class="container mt-5">
        <?php if(!empty($data)): ?>
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                </thead>
                <tbody>
                <?php foreach ($data as $key => $item): ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$item['name']?></td>
                        <td>
                            <?php if(!empty($item['price_sale'])): ?>
                                <?=number_format($item['price_sale'])?>đ
                            <?php else: ?>
                                <?=number_format($item['price'])?>đ
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?=home_base_url().'index.php?page=payment'?>" class="float-right btn btn-primary btn-lg" role="button">Thanh toán</a>
        <?php else: ?>
            <h3 class="text-center">Không có sản phẩm nào trong giỏ hàng</h3>
        <?php endif; ?>
    </div>
</main>

<?php
require "view/footer.php";
?>
