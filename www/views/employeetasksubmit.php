<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

require_once('../admin/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = get_task_id($id);
} else {
    header('Location: unknown.php');
    exit();
}

$submitId = uniqid();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$error = '';
$dateSubmit = date('Y-m-d\TH:i');

if (isset($_POST['detail'])) {
    $detail = $_POST['detail'];
    $id = $data;

    $file = $_FILES['file'];
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    if ($fileName == null) {
        $target_file = " ";
    } else {
        $file = $fileName;
        $target_file = '../file/' . $file;
        move_uploaded_file($fileTempName, $target_file);
    }

    if (empty($detail)) {
        $error = "Hãy nhập mô tả";
    } else if (empty($id)) {
        $error = "Không lấy được id task";
    } else if (empty($submitId)) {
        $error = "Không lấy được id submit";
    } else {
        $result = submit_task($submitId, $id, $dateSubmit, $target_file, $detail, "Waiting");
        $result1 = update_task_status($id, "Waiting");

        if ($result['code'] == 0) {
            header('Location: ../views/employee_index.php');
            exit();
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Submit Task</title>

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
                <h2 class="text-center text-dark mt-2 mb-3">Nhiệm vụ</h2>
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
                    <div class="form-group col-md-6">
                        <label for="">Tệp đính kèm:</label>
                        <br>
                        <li><a href="../images/avt.png">Hình ảnh</a></li>
                        <li><a href="https://google.com">Link tham khảo</a></li>
                    </div>
                    <div class="form-group">
                        <label for="user">Thông tin chi tiết:</label>
                        <br>
                        <p class="text-center"> <textarea wrap="hard" disabled name="" id="" cols="55" rows="5"><?= $data['detail'] ?></textarea></p>

                    </div>
                    <div class="form-group">
                        <label for="">Mô tả thông tin:</label>
                        <br>
                        <p class="text-center"> <textarea name="detail" id="detail" cols="55" rows="5"></textarea></p>
                    </div>
                    <div class="form-group">
                        <label for="">Thêm tệp đính kèm</label>
                        <br>
                        <input required type='file' id="tagFile" name="tagFile" />
                    </div>
                    <div class="form-group text-center">
                        <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                        ?>
                        <button type="submit" class="btn btn-success px-5 h-5">Submit</button>
                        <a href="../views/employee_index.php" class="btn btn-danger px-5 h-5">Return</a>
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