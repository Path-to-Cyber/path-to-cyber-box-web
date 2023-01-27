<?php
    if(isset($_GET['home'])){
        $home = $_GET['home'];
        include $home;
    }else{
        include 'login.html';
    }
?>

