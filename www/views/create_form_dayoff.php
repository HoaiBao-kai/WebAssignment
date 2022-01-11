<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../views/login.php');
        exit();
    }

    require_once("../admin/db.php");
    // $data = get_departments();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h3 class="text-center text-secondary mt-5 mb-3">Yêu cầu nghỉ phép</h3>
                <form method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="form-group">
                        <label for="">Ngày bắt đầu</label>
                        <input type="date" name="startday" id="startday" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số ngày muốn nghỉ</label>
                        <select class="form-control" id="dayoff">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lý do</label>
                        <textarea  class ="form-control"name="" id="" cols="20" rows="10" style="height:100px" placeholder="Lý do xin nghỉ"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">File đính kèm (nếu có)</label>
                        <input type='file' name='files[]' multiple />
                    </div>
                    <div class="form-group">
                        <?php 
                            if ($_SESSION['possition'] === "leader") {
                                ?>
                                    <p class="text-center"style="margin:15px">
                                        <button class="btn btn-success px-5 h-5">Tạo</button></span>
                                        <a href="../views/employee_dayoff.php" class="btn btn-danger px-5 h-5">Huỷ bỏ</a></span>
                                    </p>
                                <?php
                            }
                            else { ?>
                                <p class="text-center"style="margin:15px">
                                    <button class="btn btn-success px-5 h-5">Tạo</button></span>
                                    <a href="../views/employee_dayoff.php" class="btn btn-danger px-5 h-5">Huỷ bỏ</a></span>
                                </p>
                                <?php
                            }      
                        ?>
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