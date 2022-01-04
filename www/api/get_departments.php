<?php 
    require_once('../admin/db.php');

    if($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(405);
        die(json_encode(array('code' => 4, 'error' => 'API nay chi ho tro GET')));
    }

    $result = get_departments();
    die(json_encode($result));
?>