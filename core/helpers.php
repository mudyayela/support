<?php


use Symfony\Component\VarDumper\VarDumper;

function getHeader(){

    return  require_once 'views/header.php';
}
function getBack(){

    return  "<a href='". url('dashboard')."' class='btn-floating btn-lg btn-success'>Back</a>";
}
function getFooter(){

    return require_once 'views/footer.php';
}
function url($path){

    $document = $_SERVER['SCRIPT_NAME'];


    $document = str_replace('index.php','', $document);

    return $document.''. trim($path,'/');
}

function guest(){


    if ( is_null($_SESSION['user']) && is_null($_SESSION['client']))
    {
        return header('Location:'. url('/login'));
    }

    if (isset($_SESSION['user'])){


    }


}


function ticketStatuses(){

    return [
        'opened',
        'customer reply',
        'on hold',
        'progress',
        'closed'
    ];
}


if (!function_exists('dd')) {
    function dd(...$vars)
    {

        dump($vars);
    }
}
function view($view , $data = null){

    extract($data);

    $view = "views/$view.php";


    return require_once $view;
}


