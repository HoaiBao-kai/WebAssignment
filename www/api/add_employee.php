<?php
    header("Access-Control-Allow-Origin:*");
    header('Content-Type:application/json;charset=utf-8');
    require_once('../admin/db.php');

    function response($code, $mess){
        $res = array();
        $res['code']=$code;
        $res['message']=$mess;
        die(json_encode($res));
    }

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(405);
        die(json_encode(array('code' => 4, 'error' => 'API nay chi ho tro POST')));
    }

    $input = json_decode(file_get_contents('php://input'));

    if(is_null($input)){
        die(json_encode(array('code'=>4,'message'=>'API nay chi ho tro json')));
    }
    
    if(
    !property_exists($input,'username')||
    !property_exists($input,'fullname')||
    !property_exists($input,'hash_password')||
    !property_exists($input,'department')||
    !property_exists($input,'possition')||
    !property_exists($input,'avatar')
    ){
        http_response_code(400);
        response(1,'Thong tin khong hop le');
    }
    if(empty($input->username)||empty($input->fullname)||empty($input->hash_password)||empty($input->department)||empty($input->possition)||empty($input->avatar)){
        response(1,'Thieu thong tin');
    }

    $result = addEmployee($input->username,$input->fullname,$input->hash_password, $input->possition, $input->department, $input->avatar);
    die(json_encode($result)); 

?>