<?php
    global $path;
    $url = explode('/', $_SERVER['REQUEST_URI']);
    if($url[2] != 'view'){
        $path="";
    }elseif($url[3] == 'user' || $url[3] == 'admin'){
        $path="../../../";
    }else{
        $path="../../";
    }

    echo '<script>';
    echo 'var path = ' . json_encode($path) . ';';
    echo '</script>';
?>