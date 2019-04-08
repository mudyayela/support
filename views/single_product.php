<?php
getHeader();

?>
<title><?= $product->name?></title>


    <style>
        .product{
            clear: both;
            margin-bottom: 2em;
        }

        #product {
            display: grid;
            grid-template-columns: auto auto auto auto;

            grid-gap: 1em;
            top: 1em;
            padding: 2em;
            width: 100%;
            margin: 3em;

        }


        @media screen and (max-width: 1100px) {

            #product {
                display: grid;
                grid-gap: 1em;
                grid-template-columns: auto auto auto;
                top: 1em;
                padding: 1em;
                box-sizing: border-box;
                width: 100%;
            }

        }

        @media screen and (max-width: 800px) {

            #product {
                display: grid;
                grid-gap: 1em;
                grid-template-columns: auto auto;
                top: 1em;
                padding: 1em;
                box-sizing: border-box;
                width: 100%;
            }

        }



        @media screen and (max-width: 500px) {

            #product {
                display: grid;
                grid-gap: 1em;
                grid-template-columns: auto ;
                top: 1em;
                padding: 1em;
            }

        }


        .product-image{

            min-height: 200px;
            max-height: 200px;
        }

        .product:hover{
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }

        #slider-home{
            height: 50% !important ;
        }
        .card-body{
            width: 100%;
        }
        p.card-text{
            width: 100%;
        }
        a.btn{
            width: 100%;
        }
        #my-footer{
            position: relative;
            bottom: 0;
            margin-top: 1em;
        }
    </style>

<div id="product">
    <div class="product"><!-- Card -->
        <div class="card">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top image-responsive product-image" src="<?= url($product->image)?>" alt="Card image cap">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title"><?= $product->name   ?></h4>
                <!-- Text -->
                <p class="card-text"><?= ( $product->description) ?></p>
                <!-- Button -->
                <a href="#" class="btn btn-danger"><?= CURRENCY .' '.$product->price?></a>

                <?php


                    ?> <a href="<?= url('/tickets/add')?>" class="btn btn-primary">Send a complain</a>
                    <?php

                ?>

            </div>

        </div>
    </div>
</div>

<?php




getFooter();

?>