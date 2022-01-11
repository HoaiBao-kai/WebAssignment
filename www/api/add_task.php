<?php
require_once('../admin/db.php');

header("Access-Control-Allow-Origin:*");
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die(json_encode(array('code' => 4, 'error' => 'API nay chi ho tro POST')));
}

$input = json_decode(file_get_contents('php://input'));
// die(print_r($input));

if (is_null($input)) {
    die(json_encode(array('code' => 2, 'error' => 'Chi ho tro JSON')));
}

if (
    !property_exists($input, 'accountID')
    || !property_exists($input, 'deadline')
    || !property_exists($input, 'departmentID')
    || !property_exists($input, 'detail')
    || !property_exists($input, 'id')
    || !property_exists($input, 'startDay')
    || !property_exists($input, 'status')
    || !property_exists($input, 'tagFile')
    || !property_exists($input, 'title')
) {
    http_response_code(400);
    die(json_encode(array('code' => 1, 'error' => 'Thieu thong tin dau vao')));
}

// if (empty($input->id) || empty($input->name) || empty($input->room) || empty($input->detail)) {
//     die(json_encode(array('code' => 1, 'error' => 'Invalid data')));
// }


$result = addTask(
    $input->accountID,
    $input->deadline,
    $input->departmentID,
    $input->detail,
    $input->id,
    $input->startDay,
    $input->status,
    $input->tagFile,
    $input->title
);

die(json_encode($result));
