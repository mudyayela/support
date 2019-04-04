<?php

//$path = ($_SERVER['PATH_INFO']);


$pathOld = ($_SERVER['PATH_INFO']);


$path = explode('index.php',$_SERVER['PHP_SELF'])[1];




switch ($path) {

    case "/":

        return (new \App\Controller\HomeController())->index();
        break;


    /**  START OF AUTH ROUTES */
    case "/process-login":

        return (new \App\Controller\Auth\LoginController())->login();
        break;

    case "/register":

        return (new \App\Controller\Auth\LoginController())->register();
        break;

    case "/register/store":

        return (new \App\Controller\Auth\LoginController())->processRegister();
        break;


    case "/login":

        return (new \App\Controller\Auth\LoginController())->index();
        break;



    case "/logout":

        return (new \App\Controller\Auth\LoginController())->logout();
        break;



    /**  END OF AUTH ROUTES */


    /**  START OF ADMIN ROUTES */


    case "/dashboard":

        return (new \App\Controller\Auth\DashBoardController())->index();
        //return require_once "views/admin/dashboard.php";
        break;


    case "/tickets":

        return (new \App\Controller\Ticket\TicketController())->index();

        break;




    case "/tickets/add":

        return (new \App\Controller\Ticket\TicketController())->create();

        break;


    case "/tickets/store":

        return (new \App\Controller\Ticket\TicketController())->store();

        break;


    case "/tickets/view":

        return (new \App\Controller\Ticket\TicketController())->find();

        break;

    case "/tickets/reply":

        return (new \App\Controller\Ticket\TicketController())->reply();

        break;

    case "/tickets/close":

        return (new \App\Controller\Ticket\TicketController())->close();

        break;

    case "/tickets/open":

        return (new \App\Controller\Ticket\TicketController())->open();

        break;

    case "/tickets/escalation-rules":

        return (new \App\Controller\Ticket\TicketController())->escalationRules();

        break;


    case "/tickets/escalation-rules-new":

        return (new \App\Controller\Ticket\TicketController())->escalationNew();

        break;




    case "/tickets/escalation-rules/edit":

        return (new \App\Controller\Ticket\TicketController())->escalationNew();

        break;



    case "/tickets/escalate/store":

        return (new \App\Controller\Ticket\TicketController())->escalationStore();

        break;

    case "/tickets/escalation-rules/delete":

        return (new \App\Controller\Ticket\TicketController())->escalationDelete();

        break;

    case "/departments":

        return (new \App\Controller\Ticket\DepartmentController())->index();

        break;

    case "/departments/edit":

        return (new \App\Controller\Ticket\DepartmentController())->create();

        break;

    case "/departments/create":

        return (new \App\Controller\Ticket\DepartmentController())->create();

        break;

    case "/departments/store":

        return (new \App\Controller\Ticket\DepartmentController())->store();

        break;


    case "/departments/delete":

        return (new \App\Controller\Ticket\DepartmentController())->delete();

        break;


    case "/users":

        return (new \App\Controller\Auth\DashBoardController())->users();
        //return require_once "views/admin/dashboard.php";
        break;



    case "/users/add":

        return (new \App\Controller\Auth\DashBoardController())->addUser();
        //return require_once "views/admin/dashboard.php";
        break;


    case "/users/store":

        return (new \App\Controller\Auth\DashBoardController())->store();
        //return require_once "views/admin/dashboard.php";
        break;



    case "/users/edit":

        return (new \App\Controller\Auth\DashBoardController())->addUser();
        //return require_once "views/admin/dashboard.php";
        break;



    case "/products":

        return (new \App\Controller\ProductController())->index();
        //return require_once "views/admin/dashboard.php";
        break;



    case "/products/create":

        return (new \App\Controller\ProductController())->create();
        //return require_once "views/admin/dashboard.php";
        break;

    case "/products/store":

        return (new \App\Controller\ProductController())->store();
        //return require_once "views/admin/dashboard.php";
        break;


    case "/products/delete":

        return (new \App\Controller\ProductController())->delete();
        //return require_once "views/admin/dashboard.php";
        break;


    default :

        return (new \App\Controller\HomeController())->index();
}
?>

