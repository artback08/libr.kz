<?php


function redirect($address=''){
    header("Location:" . URL . "/" . $address);
    exit;
}

function dd($obj){
    echo '<pre>';
    print_r($obj);
    echo '</pre>';
}

function years($string){
    $start = mb_substr($string, 0, 4);
    $end = mb_substr($string, 4, 4);
    echo $start . '-' . $end;

}