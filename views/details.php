<style>
    #products-list{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1em;
        padding: 1em 3em;
    }
</style>

<div id="products-list">



    <div class="card">

        <!-- Card image -->
        <img class="card-img-top" src="<?= url('/public/'.$product->image) ?>" alt="Card image cap">

        <!-- Card content -->
        <div class="card-body">

            <!-- Title -->
            <h4 class="card-title"><a><?= $product->name?></a></h4>
            <!-- Text -->


        </div>

    </div>

    <div>
        <div class="card-body">

            <p class="card-text"><?php print  $product->description?></p>


            <!-- Button -->
            <a href="<?= url('add-to-cart.php?slug='.$product->slug)?>" class="btn btn-primary">Add To Cart</a>

        </div>
    </div>

</div>


