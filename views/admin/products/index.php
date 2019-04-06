<?php

getHeader();
?>

<style>
    ul.nav li{
        display: inline;
        margin-top: 1em;
        padding-left: 0.2em;
        padding-bottom: 1em;
    }


</style>

<div class="container">

    <ul class="nav">
        <li><a href="<?= url('products/create') ?>" class="'btn-floating btn-lg btn-success">New Product</a></li>
        <li><a href="<?= url('dashboard') ?>" class="'btn-floating btn-lg btn-success">Back</a></li>
    </ul>
    <!-- Card -->
    <div class="card">



        <!-- Card content -->
        <div class="card-body">

            <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Price</th>
                    <th class="th-sm">Image</th>
                    <th class="th-sm">Actions</th>


                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($products  as $product) {
                    ?>

                    <tr>
                        <td><?= $product->name?></td>
                        <td><?= $product->price?></td>
                        <td><img src="<?= url($product->image) ?>" class="img-round" style="width: 60px"></td>
                        <td><a href="<?= url('products/create?id='.$product->id)?>" class="badge badge-success">Edit</a> |
                        <a href="<?= url('products/delete?id='.$product->id)?>"  class="badge badge-danger">Delete</a> </td>


                    </tr>
                    <?php

                }
                ?>


                </tbody>

            </table>

        </div>

    </div>
    <!-- Card -->
</div>
<?php

getFooter();
?>
