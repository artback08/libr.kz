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

function activelink($link){
    if (!empty($_SERVER['REQUEST_URI'])) 
    {
        if($_SERVER['REQUEST_URI'] == '/' && $link == 'index')
        {
            echo 'text-secondary ';
        }
        if(strripos($_SERVER['REQUEST_URI'], $link)){
            echo 'text-secondary';
        }
        else{
            echo 'text-primary ';
        }  
    }
    else{
        echo 'text-secondary ';
    }
}