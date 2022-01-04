<?php 
    require_once('../admin/db.php');

    header("Access-Control-Allow-Origin:*");
    header('Content-Type: application/json; charset=utf-8');

    if($_SERVER['REQUEST_METHOD'] != 'DELETE') {
        http_response_code(405);
        die(json_encode(array('code' => 4, 'error' => 'API nay chi ho tro DELETE')));
    }

    if (!isset($_GET['id'])) {
        http_response_code(405);
        die(json_encode(array('code' => 4, 'error' => 'Thieu ID')));
    }

    $id = $_GET['id'];
    $result = delete_department($id);

    die(json_encode($result));
?>