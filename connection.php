<?php
    $con = mysqli_connect('localhost', 'root', ' ', 'webprogramming_p2');

    if(!$con){
        die('Please check your connection'.mysqli_error($con));
    }
?>