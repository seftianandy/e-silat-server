<?php
if (isset($_POST['time'])) {
    // Save the received time value to a file or database
    // You can modify this part to suit your needs
    file_put_contents('time.txt', $_POST['time']);
}
