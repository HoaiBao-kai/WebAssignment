<?php
require_once('../admin/db.php');
$a = get_submit_list('123');
while ($row = $a->fetch_assoc()) {
    print_r($row);
    echo '<br>';
}
