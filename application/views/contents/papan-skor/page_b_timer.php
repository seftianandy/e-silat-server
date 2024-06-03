<?php
if (file_exists('time.txt')) {
    $time = file_get_contents('time.txt');
} else {
    $time = '00:00:00:000';
}

echo json_encode(['time' => $time]);
