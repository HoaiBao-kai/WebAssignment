<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Unknown</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5 mx-auto p-3 border rounded">
                <h4>Bạn không có quyền truy cập vào trang này</h4>
                <p>Nhấn <a href="../views/employee_index.php">vào đây</a> để trở về trang chủ, hoặc trang web sẽ tự động chuyển hướng sau <span id="counter" class="text-danger">5</span> giây nữa.</p>
                <a class="btn btn-success px-5" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <script>
        let duration = 5;
        let countDown = 5;
        let id = setInterval(() => {
            countDown--;
            if (countDown >= 0) {
                $('#counter').html(countDown);
            }
            if (countDown == -1) {
                clearInterval(id);
                window.location.href = 'employee_index.php';
            }

        }, 1000);
    </script>
</body>

</html>