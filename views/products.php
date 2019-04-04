<style>
    #products-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 1em;
        padding: 1em 3em;
    }

    ul li {
        display: inline;
    }
</style>

<div id="products-list">
    <!-- Card -->


    <?php
    foreach ($products as $product) {


        ?>
        <div class="card">

            <!-- Card image -->
            <img class="card-img-top" src="<?= url('/public/' . $product->image) ?>" alt="Card image cap">

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title"><a><?= $product->name ?></a></h4>
                <!-- Text -->
                <p class="card-text"><?php print  str_limit($product->description, 90, '...') ?></p>
                <!-- Button -->
                <a href="<?= url('details.php?slug=' . $product->slug) ?>" class="btn btn-primary">Details</a>

            </div>

        </div>

        <?php
    }

    ?>


</div>


<nav aria-label="Page navigation example" class="container">
    <ul class="pagination pg-blue">
        <?php

        $pageNumber = $products->lastPage();
        $total = $products->total();
        $perPage = $products->perPage();


        for ($i = 1; $i <= $pageNumber; $i++) {


            $badge = $_GET['pages'] == $i ? "badge-success" : "badge-primary";

            if (! isset($_GET['pages'])) {
                $badge = $i == 1 ? "badge-success" : "badge-primary";
            }

            ?>

            <li class="page-item">
                <a class="page-link" tabindex="-1" href="<?= url('products.php?pages=' . $i) ?>">
                    <span class="page-link badge <?= $badge?>">
                    <?= $i ?></a>
                <span class="sr-only">(current)</span>
                </span>

            </li>


            <?php

        }

        ?>
    </ul>
</nav>
<?php
