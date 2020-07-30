<?php
require "../view/admin/header.php";

$name = (!empty($category)) ? $category['name'] : "";
$id = (!empty($category)) ? $category['id'] : "";
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <?php if (isset($category) && !empty($category)): ?>
            <h1 class="h2">Chỉnh sửa danh mục: <?= $name ?></h1>
        <?php else: ?>
            <h1 class="h2">Thêm danh mục</h1>
        <?php endif; ?>
    </div>
    <div class="container">
        <?php if (!empty($category)): ?>
        <form method="POST" action="<?= home_base_url() ?>admin/index.php?page=category&method=edit&action=post&id=<?=$category['id']?>"
              enctype="multipart/form-data">
            <?php else: ?>
            <form method="POST" action="<?= home_base_url() ?>admin/index.php?page=category&method=create"
                  enctype="multipart/form-data">
                <?php endif; ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" value="<?= $name ?>" class="form-control" id="exampleInputEmail1" name="name"
                           aria-describedby="emailHelp" placeholder="Tên danh mục">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</main>
<?php require "../view/admin/footer.php" ?>



