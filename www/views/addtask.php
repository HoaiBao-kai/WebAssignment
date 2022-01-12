<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../views/login.php');
    exit();
}

if ($_SESSION['possition'] != "leader") {
    header('Location: unknow.php');
    exit();
}

$user_id = $_SESSION['user'];
require_once('../admin/db.php');
$department = get_department_user($_SESSION['user']);
$account = getEmployeebyDepartment($department);
$idtask = uniqid();
$error = '';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$deadline = '';
$startDay = date("Y-m-d\TH:i");

// addTask($accountID, $deadline, $departmentID, $detail, $id, $startDay, $status, $tagFile, $title)
if (
    isset($_POST['deadline']) && isset($_POST['title']) && isset($_POST['detail'])
    && isset($_POST['tagFile']) && isset($_POST['deadline']) && $_POST['accountID']
) {

    if (empty($_POST['deadline'])) {
        $error = 'Hãy nhập mã deadline';
    } else if (empty($_POST['title'])) {
        $error = 'Hãy nhập tiêu đề';
    } else if (empty($_POST['detail'])) {
        $error = 'Hãy nhập mô tả';
    } else {
        $re = addTask(
            $_POST['accountID'],
            $_POST['deadline'],
            $department,
            $_POST['detail'],
            $idtask,
            $startDay,
            "New",
            $_POST['tagFile'],
            $_POST['title']
        );

        if ($re['code'] == 0) {
            header('Location: ../views/leader_index.php');
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Add task</title>
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
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h3 class="text-center text-secondary mt-5 mb-3">Thêm nhiệm vụ</h3>
                <form method="post" action="addtask.php" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Mã nhiệm vụ:</label>
                            <input disabled value='<?php echo $idtask ?>' class="form-control " name="id" id="id" type="text" placeholder="Chưa có mã nhiệm vụ">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mã phòng ban</label>
                            <input disabled value='<?php echo $department ?>' class="form-control" name="department" id="department" type="text" placeholder="Chưa có phòng ban">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Ngày giao</label>
                            <input disabled value="<?php echo $startDay ?>" class="form-control" name="startDay" id="startDay" type="datetime-local" placeholder="Ngày giao">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Deadline</label>
                            <input class="form-control" name="deadline" id="deadline" type="datetime-local" placeholder="Ngày giao">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="hidden" value="Waiting" name="status" id="status">
                        <input class="form-control" name="title" id="title" type="text" placeholder="Chưa có tiêu đề">
                    </div>
                    <div class="form-group">
                        <label>Nhân viên</label>
                        <select class="form-control" name="accountID" id="accountID">'
                            <?php
                                if ($account['code'] == 0) {
                                    while ($row = $account['data']->fetch_assoc()) {
                                        ?>
                                            <option value='<?php echo $employee = $row["username"] ?>'><?php echo $row['fullname'] ?></option>
                                        <?php
                                        }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="detail" id="detail" cols="20" rows="10" style="height:100px" placeholder="Mô tả về nhiệm vụ"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">File đính kèm (nếu có)</label>
                        <input type='file' id="tagFile" name="tagFile" />
                    </div>
                    <div class="form-group text-center">
                        <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                        ?>
                        <div class="form-group">
                            <p class="text-center" style="margin:15px">
                                <button type="submit" onclick="submitTask()" class="btn btn-success px-5 h-5">Thêm</button></span>
                                <a href="../views/leader_index.php" class="btn btn-danger px-5 h-5">Huỷ bỏ</a></span>
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