<?php require "../view/admin/header.php"?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Thêm sản phẩm</h1>
    </div>
    <div class="container">
        <form method="POST" action="index.php?page=product&method=create" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Giá">
            </div>
            <div class="form-group">
                <label for="price_sale">Giá KM</label>
                <input type="number" class="form-control" name="price_sale" id="price_sale" placeholder="Giá KM">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mô tả</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Ảnh</label>
                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<?php require "../view/admin/footer.php"?>



