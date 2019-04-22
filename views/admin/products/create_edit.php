<?php

getHeader();

?>

<style>
    #login {
        display: grid;
        margin: 1em;
        margin-left: 14em;
        padding: 1em 8em;
        width: 60%;
    }
</style>

<div id="login">

    <!-- Material form login -->
    <div class="card">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Add Product</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form
                class="text-center"
                method="POST"
                action="<?= url('products/store')?>"
                style="color: #757575;"
                autocomplete="off"
                enctype="multipart/form-data"

            >
                <input
                    type="hidden"
                    name="id"
                    value="<?= $product->id?>"
                >

                <!-- Name -->
                <div class="md-form">
                    <input type="text" required id="materialLoginFormEmail" value="<?= $product->name?>" name="name" autocomplete="off" class="form-control">
                    <label for="materialLoginFormEmail">Product Name</label>
                </div>


                <!-- Name -->
                <div class="md-form">
                    <input type="text" required id="materialLoginFormEmail" value="<?= $product->price?>" name="price" autocomplete="off" class="form-control">
                    <label for="materialLoginFormEmail">Price</label>
                </div>

                <!-- Image -->
                <div class="md-form">
                    <input type="file" required autocomplete="off" name="image" value="<?= $product->image?>" id="materialLoginFormPassword"    >
                    <label for="materialLoginFormPassword">Image</label>
                    <br>
                    <br>

                    <?php if (! is_null($product->image)){?> <img src="<?= url($product->image)?>" width="90px" style="background: red"><?php } ?>
                </div>


                <!-- Description -->
                <div class="md-form">
                    <textarea autocomplete="off" required name="description" id="materialLoginFormPassword" cols="5" rows="10" class="form-control"><?= $product->description?></textarea>
                    <label for="materialLoginFormPassword">Description</label>
                </div>


                <!-- Sign in button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Add</button>


            </form>
            <!-- Form -->

        </div>

    </div>
    <!-- Material form login -->
</div>


<?php

getFooter();

