<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../views/login.php');
    exit();
}

$user_id = $_SESSION['user'];
?>

<!doctype html>
<html lang="en">

<head>
    <title>Dayoff Management</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    <div class="w3-bar w3-light-grey w3-border w3-large">
        <div class="container">
            <a href="leader_index.php" class="w3-bar-item w3-button"><i class="fas fa-house-user" style="font-size: 30px;"></i></a>
            <a class="navbar-brand" style="margin-top: 5px;" href="#"><strong><?= $_SESSION['fullname'] ?></strong></a>
            <div class="w3-dropdown-hover" style="float: right;">
                <a href="#" class="w3-bar-item w3-button"><i class="fas fa-user-alt" style="font-size: 30px;"></i></a>
                <!-- <a class="btn btn-default" href="#"><strong><?php echo $_SESSION['fullname'] ?></strong></a> -->
                <div class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 50px;">
                    <a href="../views/employeeprofile.php?username=<?= $user_id ?>" class="w3-bar-item w3-button">Thông tin cá nhân</a>
                    <a href="../views/resetpassword.php" class="w3-bar-item w3-button">Đổi mật khẩu</a>
                    <a href="../views/logout.php" class="w3-bar-item w3-button">Đăng xuất</a>
                </div>
            </div>
            <div class="w3-dropdown-hover" style="float: right;">
                <a href="#" class="w3-bar-item w3-button"><i class="fas fa-address-card" style="font-size: 30px;"></i></a>
                <div class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 50px;">
                    <a class="w3-bar-item w3-button" href="../views/dayoff_management.php">Quản lý ngày nghỉ</a>
                    <a class="w3-bar-item w3-button" href="addtask.php">Quản lý nhiệm vụ</a>
                    <a class="w3-bar-item w3-button" href="../views/employee_dayoff.php">Ngày nghỉ phép</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h2 class="text-center" style="margin:30px 30px 30px 30px">Thông tin nghỉ phép</h2>
        <table class="table table-bordered text-center">
            <tr>
                <th>Tổng số ngày nghỉ phép</th>
                <th>Số ngày đã nghỉ</th>
                <th>Số ngày còn lại</th>
                <th>Tạo đơn</th>
            </tr>
            <?php
            if ($_SESSION['possition'] == "employee") {
            ?>
                <tr>
                    <td>12</td>
                    <td>12</td>
                    <td>3</td>
                    <td><a href="create_form_dayoff.php" class="btn btn-primary">Tạo đơn mới</a></td>
                </tr>
            <?php
            } else {
            ?>
                <tr>
                    <td>15</td>
                    <td>12</td>
                    <td>3</td>
                    <td><a href="create_form_dayoff.php" class="btn btn-primary">Tạo đơn mới</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <h2 class="text-center" style="margin:30px 30px 30px 30px">Danh sách yêu cầu</h2>
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <th>Ngày yêu cầu</th>
                <th>Ngày phản hồi</th>
                <th>Trạng thái</th>
            </tr>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>24/12/2021</td>
                    <td>28/12/2021</td>
                    <td>Hợp lệ</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>