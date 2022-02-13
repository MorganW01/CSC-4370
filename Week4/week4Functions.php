<?php

function PrintDateAndTime() {
    date_default_timezone_set('America/New_York');
    $date = date("m/d/Y");
    $time = date("h:i:s a");

    echo "The date is $date and the time is $time";
}
?>
