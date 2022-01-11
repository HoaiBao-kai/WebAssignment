<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../views/login.php');
    exit();
}
require_once('../admin/db.php');
$department = get_departments();
// addEmployee($username, $fullname, $hashed_password, $possition, $department, $avatar)
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['possition'])) {
    $result = addEmployee($_POST['id'], $_POST['name'], $_POST['id'], $_POST['possition'], $_POST['department'], $_POST['avatar']);
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Add employee</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h3 class="text-center text-secondary mt-5 mb-3">Thêm nhân viên</h3>
                <form method="post" action="addemployee.php" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="text-center">
                        <img class="avatar" src="../images/avt.png" alt="test">
                    </div>
                    <div style="margin:10px" class="text-center">
                        <label for="img">Chọn ảnh đại diện:</label>
                        <input type="file" id="avatar" name="avatar" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Mã nhân viên:</label>
                        <input class="form-control " name="id" id="ID" type="text" placeholder="Chưa có mã nhân viên">
                    </div>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input class="form-control" name="name" id="name" type="text" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label>Phòng ban</label>
                        <select class="form-control" name="department" id="department">
                            <?php
                            while ($row = $department->fetch_assoc()) {
                            ?>
                                <option value='<?php echo $row["id"] ?>'><?php echo $row['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <select class="form-control" name="possition" id="possition">
                            <option value="admin">Giám đốc</option>
                            <option value="leader">Trưởng phòng</option>
                            <option value="employee">Nhân viên</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="text-center" style="margin:15px">
                            <button type="submit" class="btn btn-success px-5 h-5">Thêm</button></span>
                            <a href="" class="btn btn-danger px-5 h-5">Huỷ bỏ</a></span>
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