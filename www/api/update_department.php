<?php 
    require_once('../admin/db.php');

    header("Access-Control-Allow-Origin:*");
    header('Content-Type: application/json; charset=utf-8');

    if($_SERVER['REQUEST_METHOD'] != 'PUT') {
        http_response_code(405);
        die(json_encode(array('code' => 4, 'error' => 'API nay chi ho tro PUT')));
    }

    $input = json_decode(file_get_contents('php://input'));

    if (is_null($input)) {
        die(json_encode(array('code' => 2, 'error' => 'Chi ho tro JSON')));
    }

    if (!property_exists($input, 'id') || !property_exists($input, 'name') || !property_exists($input, 'room') || !property_exists($input, 'detail')) {
        http_response_code(400);
        die(json_encode(array('code' => 1, 'error' => 'Thieu thong tin dau vao')));
    }

    if (empty($input->id) || empty($input->name) || empty($input->room) || empty($input->detail)) {
        die(json_encode(array('code' => 1, 'error' => 'Invalid data')));
    }

    
    $result = update_department($input->id, $input->name, $input->room, $input->detail);

    die(json_encode($result));
?>