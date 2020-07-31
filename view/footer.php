<footer class="container text-center">
    <p>Footer</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $('.register-btn').click(function () {
        let username = $('#username').val();
        let password = $('#password').val();
        $.ajax({
            url : base_url+"index.php?page=register",
            method : "post",
            dataType : "json",
            data : {
                username : username,
                password : password
            },
            success : function (response) {
                if (response.success){
                    alert('Đăng kí thành công');
                    location.reload()
                }else{
                    alert('Đăng kí thất bại');
                }
            }
        })
    })
    $('.login-btn').click(function () {
        let username = $('#username_login').val();
        let password = $('#password_login').val();
        $.ajax({
            url : base_url+"index.php?page=login",
            method : "post",
            dataType : "json",
            data : {
                username : username,
                password : password
            },
            success : function (response) {
                if (response.success){
                    alert('Đăng nhập thành công');
                    location.reload()
                }else{
                    alert('Đăng nhập thất bại');
                }
            }
        })
    });
    $('.add-cart').click(function () {
        let id = $(this).data('id');
        let name = $(this).data('name');
        $.ajax({
            url : base_url+"index.php?page=addToCart",
            method : "post",
            dataType : "json",
            data : {
                id : id,
                name : name,
                qty : 1
            },
            success : function (response) {
                if (response.success){
                    alert('Thêm vào giỏ hàng thành công');
                }else{
                    alert('Thêm vào giỏ hàng thất bại');
                }
            }
        })
    });
    $('#search').keyup(function () {
        let text = $(this).val();
        if(text.length>0){
            $.ajax({
                url: base_url+'index.php?page=search',
                method: "POST",
                data : {
                    search : text,
                },
                success: function (response) {
                    let res = JSON.parse(response);
                    if (res.data.length > 0){
                        $('.list-result').css('display','block');
                        let list = '';
                        res.data.forEach(item => {
                            let row = `
                                 <li style="line-height: 40px"><a href="${base_url}index.php?page=product&id=${item.id}">
                                       ${item.name}
                                </a></li>
                            `;
                            list += row;
                        })
                        let html = `
                            <ul class="mb-0">
                                ${list}
                            </ul>
                         `;
                        $('.list-result').html(html)
                    }else{
                        $('.list-result').css('display','block');
                        $('.list-result').css('bottom','-26px');
                        $('.list-result').html("Không có dữ liệu")
                    }
                }
            })
        }else{
            $('.list-result').css('display','none');
        }
    })
</script>
</body>
</html>