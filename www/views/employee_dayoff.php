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
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#"><strong>NPH</strong></a>
        
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a class="nav-link" href="../views/employee_dayoff.php">Nghỉ phép</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/employeeprofile.php">Thông tin cá nhân</a>
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
        <h2 class="text-center" style="margin:30px 30px 30px 30px">Thông tin nghỉ phép</h2>
        <table class="table table-bordered text-center">
            <tr>
                <th>Tổng số ngày nghỉ phép</th>
                <th>Số ngày đã nghỉ</th>
                <th>Số ngày còn lại</th>
                <th>Tạo đơn</th>
            </tr>
            <tr>
                <td>15</td>
                <td>12</td>
                <td>3</td>
                <td><p>Nhấn vào đây để <a href="create_form_dayoff.php"> tạo đơn mới</a></p></td>
            </tr>
        </table>
        <!-- <div>
            Tổng số ngày nghỉ phép: 
        </div> -->
        <h2 class="text-center" style="margin:30px 30px 30px 30px">Danh sách yêu cầu</h2>
        <table class="table table-bordered text-center">
            <tr >
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