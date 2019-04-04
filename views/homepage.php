<?php


getHeader()



?>
<style>
    #products {
        display: grid;
        grid-template-columns: auto auto auto auto;

        grid-gap: 1em;
        top: 1em;
        padding: 2em;
        width: 100%;
        height: 200px;
        min-height: 100% !important;

    }

    @media screen and (max-width: 800px) {

        #products {
            display: grid;
            grid-gap: 1em;
            grid-template-columns: auto auto;
            top: 1em;
            padding: 1em;
            box-sizing: border-box;
            height: 200px;
            width: 100%;
            min-height: 100% !important;
        }

    }

    @media screen and (max-width: 1100px) {

        #products {
            display: grid;
            grid-gap: 1em;
            grid-template-columns: auto auto auto;
            top: 1em;
            padding: 1em;
            box-sizing: border-box;
            height: 200px;
            width: 100%;
            min-height: 100% !important;
        }

    }


    @media screen and (max-width: 500px) {

        #products {
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
        margin-top: 70%;
    }
</style>

<title>Home | Cosmetic products</title>

<div id="products">

    <?php foreach ($products as $product)
    {
        ?>

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
                    <p class="card-text"><?= str_limit( $product->description ,'100','...') ?></p>
                    <!-- Button -->
                    <a href="#" class="btn btn-danger"><?= CURRENCY .' '.$product->price?></a>

                    <?php

                    if (isset($_SESSION['client']) || ! isset($_SESSION['user']))
                    {
                        ?> <a href="<?= url('/tickets/add')?>" class="btn btn-primary">Order</a>
                        <?php
                    }

                    ?>

                </div>

            </div>
        </div>
        <?php

    }
    ?>





</div>



<?php
getFooter();
