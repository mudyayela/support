<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?= url('public/style.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/css/mdb.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>

    <style>

        body{
            min-height: 100vh !important;
        }

        #my-footer{


        }
        #login{
            width: 50%;
            padding: 2em;
            margin-left: 300px;
        }
        .container{
            margin-top: 1em;
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }
        #top-header{
            background: #000;
            height: 2em;
            color: #FFF;
            padding: 1px;

        }

        #top-header ul {
            grid-gap: 2em;
        }
        #top-header ul li{
            display: inline-block;

        }



        @media screen and (max-width: 800px) {

            #my-footer{

            }
        }

        @media screen and (max-width: 1400px) {


        }

    </style>

</head>
<body>
<?php

$request =  explode('/', $_SERVER['REQUEST_URI']);



$uri = end($request);


?>


<header id="top-header">

    <ul>
        <li>Tel: <?= BUSINESS_TEL ?></li>
        <li>EMAIL: <?= BUSINESS_EMAIL?></li>
    </ul>



</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= url('/home') ?>"><?= BUSINESS_NAME?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <?php
            if (isset($_SESSION['user']) || isset($_SESSION['client'])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url('/dashboard') ?>">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <?php
            }
            else{
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= url('/home') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php
            }
            ?>

        </ul>
        <ul class="navbar-nav pull-right">




            <?php
            if (isset($_SESSION['user']) || isset($_SESSION['client'])){
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fas fa-user"></i>  <?= $_SESSION['name']?>  </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="<?= url('dashboard') ?>">Dashboard <span class="sr-only"></span></a>
                        <a class="dropdown-item" href="<?= url('logout') ?>">Logout <span class="sr-only"></span></a>

                    </div>
                </li>

            <?php
            }
            else{
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= url('login') ?>">Login <span class="sr-only"></span></a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?= url('register') ?>">Register <span class="sr-only"></span></a>
                </li>


            <?php
            }


            ?>

        </ul>
    </div>
</nav>





