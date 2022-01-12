<?php
require_once('../admin/db.php');
$a = get_current_dayoff('vanA');
print_r($a['day_off_response']);
