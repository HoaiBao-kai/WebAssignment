<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../views/login.php');
    exit();
}

require_once("../admin/db.php");

$user_id = $_SESSION['user'];

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $data = get_detail_dayoff($id);
    
    if ($data['tag_file'] == " " || is_null($data['tag_file'])) {
        $namefile = '';
    } else {
        $file = explode("/", $data['tag_file']);
        if (isset($file['2'])) {
            $namefile = $file['2'];
        }
    }
    
} else {
    header('Location: ../views/unknown.php');
    exit();
}

if (isset($_POST['accept'])) {

    $id = $_GET['id'];
    $date = date('Y-m-d');
    $result = update_num_dayoff($id, $data['day_off_request']);
    $result2 = update_status_dayoff("Accept", $id, $date);
    header('Location: ../views/dayoff_management.php');
    exit();
}

if (isset($_POST['reject'])) {

    $id = $_GET['id'];
    $date = date('Y-m-d');
    $result2 = update_status_dayoff("Reject", $id, $date);
    header('Location: ../views/dayoff_management.php');
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Detail Dayoff</title>
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
            <?php
            if ($_SESSION['possition'] === "leader") {
            ?>
                <a href="leader_index.php" class="w3-bar-item w3-button"><i class="fas fa-house-user" style="font-size: 30px;"></i></a>
                <a class="navbar-brand" style="margin-top: 5px;" href="#"><strong><?= $_SESSION['fullname'] ?></strong></a>
                <div class="w3-dropdown-hover" style="float: right;">
                    <a href="#" class="w3-bar-item w3-button"><i class="fas fa-user-alt" style="font-size: 30px;"></i></a>
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
            <?php
            } else {
            ?>
                <a href="employee_index.php" class="w3-bar-item w3-button"><i class="fas fa-house-user" style="font-size: 30px;"></i></a>
                <a class="navbar-brand" style="margin-top: 5px;" href="#"><strong><?= $_SESSION['fullname'] ?></strong></a>
                <div class="w3-dropdown-hover" style="float: right;">
                    <a href="#" class="w3-bar-item w3-button"><i class="fas fa-user-alt" style="font-size: 30px;"></i></a>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 50px;">
                        <a href="../views/employeeprofile.php?username=<?= $user_id ?>" class="w3-bar-item w3-button">Thông tin cá nhân</a>
                        <a href="../views/resetpassword.php" class="w3-bar-item w3-button">Đổi mật khẩu</a>
                        <a href="../views/logout.php" class="w3-bar-item w3-button">Đăng xuất</a>
                    </div>
                </div>
                <div class="w3-dropdown-hover" style="float: right;">
                    <a href="#" class="w3-bar-item w3-button"><i class="fas fa-address-card" style="font-size: 30px;"></i></a>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 50px;">
                        <a class="w3-bar-item w3-button" href="../views/employee_index.php">Nhiệm vụ</a>
                        <a class="w3-bar-item w3-button" href="../views/employee_dayoff.php">Ngày nghỉ phép</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h3 class="text-center text-secondary mt-5 mb-3">Yêu cầu nghỉ phép</h3>
                <form method="post" enctype="multipart/form-data" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Mã nhân viên</label>
                            <input disabled class="form-control" type="text" value="<?= $data['employeeId'] ?>" name="" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Số ngày nghỉ</label>
                            <input disabled class="form-control" type="text" value="<?= $data['day_off_request'] ?>" name="" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Ngày bắt đầu</label>
                            <input disabled class="form-control" type="date" value="<?= $data['day_start'] ?>" name="" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Trạng thái</label>
                            <input disabled class="form-control" type="text" value="<?= $data['result'] ?>" name="" id="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lý do</label>
                        <input disabled class="form-control" name="reason" id="reason" cols="20" rows="10" style="height:100px" placeholder="Lý do xin nghỉ" value="<?= $data['reason'] ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="">File đính kèm: <a href="<?php echo $data['tag_file'] ?>" download><?= $namefile ?></a></label>
                    </div>
                    <div class="form-group">
                        <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                        ?>
                        <p class="text-center" style="margin:15px">
                            <button name="accept" class="btn btn-success px-5 h-5">Accept</button></span>
                            <button name="reject" class="btn btn-danger px-5 h-5">Reject</button></span>
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