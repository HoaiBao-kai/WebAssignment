<?php
    header('Content-Type:application/json;charset=utf-8');
    require_once('../admin/db.php');
    $input = json_decode(file_get_contents('php://input'));
    if($_SERVER['REQUEST_METHOD'] != 'PUT') {
        http_response_code(405);
        die(json_encode(array('code' => 4, 'error' => 'API nay chi ho tro PUT')));
    }
    if(is_null($input)){
        die(json_encode(array('code'=>4,'message'=>'API nay chi ho tro json')));
    }
    
    if(!property_exists($input,'username')||
    !property_exists($input,'password')){
        http_response_code(400);
        die(json_encode(array('code'=>4,'error'=>'Thieu thong tin')));
    }
    if(empty($input->username)||empty($input->password)){
        die(json_encode(array('code'=>4,'error'=>'Thong tin khong hop le')));
    }

    $result = updatePassword($input->username,$input->password);
    die(json_encode($result)); 

?>