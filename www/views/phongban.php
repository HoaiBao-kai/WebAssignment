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
                        <input type="text" name="mpb" id="mpb" value="H120" class="form-control">
                    </div>    
                    <div class="form-group">
                        <label for="name">Tên phòng ban</label>
                        <input type="text" name="pb" id="pb" value="Tài chính" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sophong">Số phòng</label>
                        <input type="text" name="sophong" id="sophong" value="C004" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="comment">Mô tả</label>
                        <textarea name="comment" id="comment" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Trưởng phòng</label>
                        <select class="form-control" id="tp">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success px-5 h-5" >Update</button>
                        <button class="btn btn-danger px-5 h-5">Cancel</button>
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