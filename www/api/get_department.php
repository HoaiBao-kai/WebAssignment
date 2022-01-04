<?php 
    require_once('../admin/db.php');

    header('Content-Type: application/json; charset=utf-8');

    if($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(405);
        die(json_encode(array('code' => 4, 'error' => 'API nay chi ho tro GET')));
    }

    if (!isset($_GET['id'])) {
        http_response_code(405);
        die(json_encode(array('code' => 4, 'error' => 'Thieu ID')));
    }

    $id = $_GET['id'];
    $result = get_department($id);

    die(json_encode($result));
?>