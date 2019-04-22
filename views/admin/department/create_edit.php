<?php
getHeader();
?>
    <style>
        .container {
            padding-top: 12px;
            min-height: 100%;
        }
    </style>

    <div class="container">

        <?= getBack(); ?>
        <form
                method="post"
                action="<?= url('/departments/store') ?>"
                class="form-horizontal"
        >

            <!-- Material form login -->
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong> Create a new Depatment </strong>
                </h5>

                <input type="hidden" name="id" value="<?= $department->id ?>">

                <!--Card content-->
                <div class="card-body px-lg-5  pt-0">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;">

                        <!-- Email -->
                        <div class="md-form col-md-3">

                            <input type="text" required name="name" value="<?= $department->name ?>" id="materialLoginFormEmail"
                                   class="form-control">
                            <label for="materialLoginFormEmail">Department Name</label>


                        </div>
                        <?php

                        ?>

                        <?php foreach ($users as $user) {



                            ?>


                            <!-- Material unchecked -->
                            <div class="form-check">
                                <input
                                        type="checkbox"
                                        name="user[]"
                                        required
                                        class="form-check-input"
                                        value="<?= $user->id?>" id="materialUnchecked"
                                      <?php

                                      if ($department->departmentUsers->where('id',$user->id)->count())
                                      {
                                          echo  "checked";
                                      }
                                      ?>

                                >
                                <label class="form-check-label" for="materialUnchecked"><?= $user->name?></label>
                            </div>
                            <?php
                        }

                        ?>


                        </div>


                        <!-- Sign in button -->
                        <button class="btn btn-outline-info btn-rounded my-4 waves-effect z-depth-0" type="submit">
                            Submit
                        </button>


                    </form>
                    <!-- Form -->

                </div>

            </div>
            <!-- Material form login -->

        </form>


    </div>

<?php
getFooter();
