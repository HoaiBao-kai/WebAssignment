<?php

	#  https://www.w3schools.com/php/php_mysql_select.asp

	define('host','localhost');
	define('user','root');
	define('pass','');
	define('db', 'dbagm');
	
    // $host = 'localhost'; // tên mysql server
    // $user = 'root';
    // $pass = '';
    // $db = 'dbagm'; // tên databse

	function open_database() {
		$conn = new mysqli(host, user, pass, db);
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die('Không thể kết nối database: ' . $conn->connect_error);
		}

		return $conn;
	}

	// echo "Kết nối thành công tới database<br><br>";

	// $sql = "SELECT * from account";
	// $result = $conn->query($sql);

	// if ($result->num_rows > 0) {
	// 	while($row = $result->fetch_assoc()) 
	// 	{
	// 		echo json_encode($row);
	// 		echo "<br>";
	// 	}
	// }
	// else {
	// 	echo "Bảng chưa có dữ liệu";
	// }

	// // Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
	// echo "<br><img src='/images/tdt-logo.png' />";
	// echo "<p>Đây là ảnh mẫu, lấy từ thư mục images tại web root.</p>";

	function login($user, $pass) {
		$sql = 'select * from account where username = ?';
		$conn = open_database();
		
		$stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);
        if (!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute the query');
        }

        $result = $stm->get_result();
        if ($result->num_rows == 0) {
            return array('code' => 2, 'error' => 'user does not exist');
        }

        $data = $result->fetch_assoc();
		print_r($data);

        $hashed_password = $data['hash_password'];

        if (!password_verify($pass, $hashed_password)) {
            return array('code' => 3, 'error' => 'invalid password');
        }

        return array('code' => 0, 'error' => '', 'data' => $data);
	}

	function get_departments() {
		$sql = 'select * from department';
        $conn = open_database();

        $stm = $conn->prepare($sql);
    
        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        $result = $stm->get_result();
        if ($result->num_rows == 0) {
            return array('code' => 2, 'error' => 'An error occured');
        }

       $output = array();
       while($row = $result->fetch_assoc()) {
           $output[] = $row;
       }

       return $output;
	}

	function get_department($id) {
		$sql = 'select * from department where id = ?';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $id);
    
        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        $result = $stm->get_result();
        if ($result->num_rows == 0) {
            return array('code' => 2, 'error' => 'ID not exist');
        }

       return $result->fetch_assoc();
	}

?>
