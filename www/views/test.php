<?php
require_once('../admin/db.php');
$a = add_request_dayoff('$id', '$employeeId', '$day_start', '$reason', '$result', '$departId', '$day_off_request', '$tag_file');

print_r($a);
