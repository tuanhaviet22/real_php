<?php require "../view/admin/header.php" ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh mục</h1>
        <a href="index.php?page=category&method=add" class="btn btn-primary btn-lg active" role="button"
           aria-pressed="true">Thêm danh mục</a>
    </div>
    <div class="container">
        <?php if (!empty($data)): ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $value): ?>
                    <tr style="border-bottom: 1px solid #f2f2f2">
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['name'] ?></td>
                        <td class="d-flex justify-content-center">
                            <a class="d-block mr-5"
                               href="<?= home_base_url() ?>admin/index.php?page=category&method=edit&id=<?= $value['id'] ?>"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a class="d-block"
                               href="<?= home_base_url() ?>admin/index.php?page=category&method=delete&id=<?= $value['id'] ?>"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h3 class="text-danger">Không có dữ liệu</h3>
        <?php endif; ?>
    </div>
</main>
<?php require "../view/admin/footer.php" ?>



