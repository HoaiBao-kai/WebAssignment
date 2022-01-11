<?php

#  https://www.w3schools.com/php/php_mysql_select.asp

define('host', 'localhost');
define('user', 'root');
define('pass', '');
define('db', 'dbagm');

// $host = 'localhost'; // tên mysql server
// $user = 'root';
// $pass = '';
// $db = 'dbagm'; // tên databse

function open_database()
{
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

function login($user, $pass)
{
    $sql = 'select * from account where username = ?';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('s', $user);
    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute the query');
    }

    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'user does not exist');
    }

    $data = $result->fetch_assoc();
    // print_r($data);

    $hashed_password = $data['hash_password'];

    if (password_verify($user, $hashed_password)) {
        return array('code' => 100, 'error' => 'reset pass word', 'data' => $data);
    }

    if (!password_verify($pass, $hashed_password)) {
        return array('code' => 3, 'error' => 'invalid password');
    }

    return array('code' => 0, 'error' => '', 'data' => $data);
}


function getEmployee()
{
    $sql = 'select * from account where possition <> "admin"';
    $conn = open_database();


    $result = $conn->query($sql);

    $output = array();

    while (($row = $result->fetch_assoc())) {
        $output[] = $row;
    }
    return $output;
}

function getEmployeeByID($id)
{
    $sql = 'select * from account where username = ?';
    $conn = open_database();

    $stm = $conn->prepare($sql);

    $stm->bind_param('s', $id);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }


    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'An error occured');
    }

    return $result->fetch_assoc();
}
function updatePassword($username, $password)
{
    $sql = 'update account set hash_password = ? where username = ?';
    $conn = open_database();

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stm = $conn->prepare($sql);
    $stm->bind_param('ss', $hash, $username);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    if ($stm->affected_rows == 0) {

        return array('code' => 2, 'error' => 'An error occured');
    }

    return array('code' => 0, 'message' => 'Update successful');
}

function addEmployee($username, $fullname, $hashed_password, $possition, $department, $avatar)
{
    $sql = 'insert into account(username, fullname, hash_password,possition,department,avatar) values(?,?,?,?,?,?)';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $hash = password_hash($hashed_password, PASSWORD_DEFAULT);
    $stm->bind_param('ssssss', $username, $fullname, $hash, $possition, $department, $avatar);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    if ($stm->affected_rows == 0) {
        return array('code' => 2, 'error' => 'An error occured');
    }

    return array('code' => 0, 'message' => 'Create successful');
}

function get_departments()
{
    $sql = 'select * from department';
    $conn = open_database();

    $stm = $conn->prepare($sql);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'An error occured');
    }

    return $result;
}

function get_department($id)
{
    $sql = 'select * from department where id = ?';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('s', $id);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'ID not exist');
    }

    return $result->fetch_assoc();
}

function add_department($id, $name, $room, $detail)
{
    $sql = 'insert into department(id, name, room, detail) values(?,?,?,?)';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('ssss', $id, $name, $room, $detail);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    if ($stm->affected_rows == 0) {
        return array('code' => 2, 'error' => 'An error occured');
    }

    return array('code' => 0, 'error' => 'Create successful');
}

function update_department($id, $name, $room, $detail)
{
    $sql = 'update department set name = ?, room = ?, detail = ? where id = ?';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('ssss', $name, $room, $detail, $id);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    if ($stm->affected_rows == 0) {
        return array('code' => 2, 'error' => 'An error occured');
    }

    return array('code' => 0, 'error' => 'Update successful');
}

function delete_department($id)
{
    $sql = 'delete from department where id = ?';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('i', $id);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    if ($stm->affected_rows == 0) {
        return array('code' => 2, 'error' => 'ID not exist');
    }

    return array('code' => 0, 'error' => 'Delete successful');
}

function addTask($accountID, $deadline, $departmentID, $detail, $id, $startDay, $status, $tagFile, $title)
{
    $sql = 'INSERT INTO task(id, title, detail, start_day, deadline, account_id, status, tag_file, department_id) VALUES (?,?,?,?,?,?,?,?,?)';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('sssssssss', $id, $title, $detail, $startDay, $deadline, $accountID, $status, $tagFile, $departmentID);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    if ($stm->affected_rows == 0) {

        return array('code' => 2, 'error' => 'An error occured');
    }

    return array('code' => 0, 'message' => 'Create successful');
}


function getEmployeebyDepartment($departmentID)
{
    $sql = 'select * from account where department = ?';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('s', $departmentID);
    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'An error occured');
    }



    return $result;
}

function get_department_user($id)
{
    $sql = 'select department from account where username = ?';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('s', $id);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'ID not exist');
    }

    return $result->fetch_assoc()['department'];
}

function get_task_department($id)
{
    $sql = "select * from task where department_id = ?";
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('s', $id);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'ID not exist');
    }

    return $result;

}

function get_dayoff_department($id)
{
    $sql = "select * from day_off where department_id = ?";
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('s', $id);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'ID not exist');
    }

    return $result;
}

function get_task_id($id) 
{
    $sql = 'select * from task where id = ?';
    $conn = open_database();

    $stm = $conn->prepare($sql);
    $stm->bind_param('s', $id);

    if (!$stm->execute()) {
        return array('code' => 1, 'error' => 'Can not execute command');
    }

    $result = $stm->get_result();
    if ($result->num_rows == 0) {
        return array('code' => 2, 'error' => 'ID not exist');
    }

    return $result->fetch_assoc();
}
