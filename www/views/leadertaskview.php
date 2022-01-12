<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

require_once('../admin/db.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>View Submit Task</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../style.css"> -->
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <h2 class="text-center text-dark mt-2 mb-3">Thông tin phản hồi</h2>
                <form action="" enctype="multipart/form-data" method="post" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Ngày giao</label>
                            <input type="text" name="ngaygiao" id="ngaygiao" value="<?= $data['start_day'] ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id">Hạn chót</label>
                            <input type="text" name="hanchot" id="hanchot" value="<?= $data['deadline'] ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Trạng thái</label>
                            <input type="text" name="status" id="status" value="<?= $data['status'] ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Task ID</label>
                            <input type="text" name="id" id="id" value="<?php echo $data['id'] ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Ngày nộp</label>
                        <input type="text" name="ngaygiao" id="ngaygiao" value="<?= $data['start_day'] ?>" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="user">Thông tin chi tiết:</label>
                        <br>
                        <p class="text-center"> <textarea wrap="hard" disabled name="" id="" cols="55" rows="5"><?= $data['detail'] ?></textarea></p>

                    </div>
                    <div class="form-group">
                        <label for="">Mô tả thông tin:</label>
                        <br>
                        <p class="text-center"> <textarea disabled name="detail" id="detail" cols="55" rows="5"></textarea></p>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Tệp đính kèm:</label>
                            <br>
                            <li><a href="../images/avt.png">Hình ảnh</a></li>
                            <li><a href="https://google.com">Link tham khảo</a></li>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tệp đính kèm(người dùng nộp):</label>
                            <br>
                            <li><a href="../images/avt.png">Hình ảnh</a></li>
                            <li><a href="https://google.com">Link tham khảo</a></li>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                        ?>
                        <button type="submit" class="btn btn-success px-5 h-5">Accept</button>
                        <a href="../views/employee_index.php" class="btn btn-danger px-5 h-5">Reject</a>
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