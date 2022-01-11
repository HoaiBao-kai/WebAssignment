<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../views/login.php');
        exit();
    }

    require_once("../admin/db.php");
    $data = get_departments();
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
    <script src="../main.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#"><strong><?= $_SESSION['fullname'] ?></strong></a>
        
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../views/admin_index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/#">Tài khoản</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/department_management.php">Phòng ban</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/resetpassword.php">Đổi mật khẩu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/logout.php">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <div class="container">
        <h2 class="text-center" style="margin:30px 30px 30px 30px">Danh sách phòng ban</h2>
        <div class="form-group">
            <a href="../views/adddepartment.php" class="btn btn-primary">Thêm phòng ban</a>
        </div>
        <table class="table table-bordered text-center">
            <tr >
                <th>ID</th>
                <th>Tên phòng ban</th>
                <th>Vị trí</th>
                <th>Mô tả</th>
                <th>Chi tiết</th>
            </tr> 
            <tbody id="department-body">
                <?php
                    while ($row = $data->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['room'] ?></td>
                            <td><?= $row['detail'] ?></td>
                            <td><a href="../views/phongban.php?id=<?=$row['id']?>" class="btn btn-primary">Xem chi tiết</a></td>
                        </tr>
                        <?php
                    }
                ?>
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