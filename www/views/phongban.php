<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../views/login.php');
        exit();
    }

    require_once("../admin/db.php");
    
    $error = "";

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $data = get_department($id);
        $data1 = getEmployeebyDepartment($id);
        $data2 = get_department_leader($id);
        $data3 = get_employee_department_with_leader($id);
    }

    if (isset($_POST['update'])) {
        if (empty($_POST['pb']) || empty($_POST['sophong']) || empty($_POST['comment']) || empty($_POST['manager']))
        {
            $error = "Invalid input";
            echo $_POST['manager'];
            echo $error;
        }
        else
        {
            $pb = $_POST['pb'];
            $sophong = $_POST['sophong'];
            $comment = $_POST['comment'];
            $id = $_GET['id'];
            $manager = $_POST['manager'];
    
            $result = update_department($id, $pb, $sophong, $comment);
            $result2 = down_manager($data2['username'], $id);
            $result1 = update_manager($manager, $id);
            header('Location: ../views/department_management.php');
        }
    }
    
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
            <div class="col-lg-6 col-md-8">
                <h2 class="text-center text-dark mt-5 mb-3">Thông tin phòng ban</h2>
                <form action="" method="post" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="form-group">
                        <label for="id">Mã phòng ban</label>
                        <input disabled value="<?= $data['id'] ?>" type="text" name="mpb" id="mpb" class="form-control">
                    </div>    
                    <div class="form-group">
                        <label for="name">Tên phòng ban</label>
                        <input type="text" value="<?= $data['name'] ?>" name="pb" id="pb" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sophong">Số phòng</label>
                        <input type="text" value="<?= $data['room'] ?>" name="sophong" id="sophong" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Trưởng phòng</label>
                        <input type="text" value="<?= $data2['fullname'] ?>" class="form-control" disabled> 
                    </div> -->
                    <div class="form-group">
                        <label for="comment">Mô tả</label>
                        <textarea name="comment" id="comment" rows="5" class="form-control"><?= $data['detail'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Trưởng phòng</label>
                        <select class="form-control" id="manager" name="manager">
                            <?php 
                                if ($data2['code'] != 0) 
                                {
                                    while ($row = $data1->fetch_assoc()) {
                                        ?>
                                            <option value='<?php echo $employee = $row["username"] ?>'><?= $row['fullname'] ?></option>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                        <option value='<?php echo $employee = $data2["username"] ?>'><?= $data2['fullname'] ?></option>
                                    <?php
                                        while ($row = $data1->fetch_assoc()) {
                                            ?>
                                                <option value='<?php echo $employee = $row["username"] ?>'><?= $row['fullname'] ?></option>
                                            <?php
                                        }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button class="btn btn-success px-5 h-5" type="submit" name="update">Update</button>
                        <a href="../views/department_management.php" class="btn btn-danger px-5 h-5">Cancel</a>
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