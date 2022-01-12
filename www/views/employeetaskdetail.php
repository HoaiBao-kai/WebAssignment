<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }

    require_once('../admin/db.php');

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $data = get_task_id($id);
        $file=explode("/",$data['tag_file']); 
        $namefile=$file['2'];
    }

    if (isset($_POST['update'])) {
        
        $id = $_GET['id'];
    
        $result = update_task_status($id, "In progress");
        
        if ($_SESSION['possition'] === "leader") {
            header('Location: ../views/leader_index.php');
        }
        header('Location: ../views/employee_index.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Thông tin nhiệm vụ</title>
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
                <form action="" method="post" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="form-group">
                        <label for="name">Ngày giao</label>
                        <input type="text" name="ngaygiao" id="ngaygiao" value="<?= $data['start_day'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="id">Hạn chót</label>
                        <input type="text" name="hanchot" id="hanchot" value="<?= $data['deadline'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <input type="text" name="trạng thái" id="trạng thái" value="<?= $data['status'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="user">Thông tin chi tiết:</label>
                        <textarea name="comment" id="comment" rows="5" class="form-control" disabled><?= $data['detail'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Tệp đính kèm: <a href="<?php echo $data['tag_file'] ?>" download><?= $namefile ?></a></label>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success px-5 h-5" type="submit" name="update">Start</button>
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