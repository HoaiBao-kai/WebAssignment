<!doctype html>
<html lang="en">
  <head>
    <title>New department</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script src="../main.js"></script>
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h3 class="text-center text-secondary mt-5 mb-3">Thêm phòng ban</h3>
                <form method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light" id="add_department_form">
                    <div class="form-group">
                        <label>Mã phòng ban</label>
                        <input class ="form-control " name="maphongban" id="maphongban" type="text" placeholder="Chưa xác định được mã phòng ban">
                    </div>
                    <div class="form-group">
                        <label>Tên phòng ban</label>
                        <input class ="form-control" name="tenphongban" id="tenphongban" type="text" placeholder="Nhập tên phòng ban">
                    </div>
                    <div class="form-group">
                        <label>Số phòng</label>
                        <input class ="form-control" name="room" id="room" type="text" placeholder="Nhập số phòng">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea  class ="form-control"name="detail" id="detail" cols="20" rows="10" style="height:100px" placeholder="Thêm mô tả về phòng ban"></textarea>
                    </div>
                    <div class="form-group">
                        <p class="text-center"style="margin:15px">
                            <button onclick="add_department()" class="btn btn-success px-5 h-5">Thêm</button></span>
                            <a href="../views/employee_index.php" class="btn btn-danger px-5 h-5">Huỷ bỏ</a></span>
                        </p> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>