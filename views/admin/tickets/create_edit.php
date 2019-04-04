<?php
getHeader();
?>
<style>
    .container{
        padding-top: 12px;
        min-height: 100%;
    }
</style>

<div class="container">

    <?= getBack(); ?>
    <form
        method="post"
        action="<?= url('/tickets/store')?>"
        class="form-horizontal"
    >
        <!-- Material form contact -->
        <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Create New Ticket</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;">

                    <!-- Name -->
                    <div class="md-form mt-3">
                        <input type="text" name="subject" id="materialContactFormName" class="form-control">
                        <label for="materialContactFormName">Subject</label>
                    </div>


                    <!-- Subject -->
                    <span>Department</span>
                    <select name="department_id" class="mdb-select">
                        <?php

                        foreach ($departments as $department)
                        {
                            ?>

                            <option value="<?= $department->id?>"><?= $department->name ?></option>
                            <?php

                        }

                        ?>
                    </select>
                    <!-- Subject -->
                    <span>Priority</span>
                    <select name="priority_id" class="mdb-select">
                        <?php

                        foreach ($priorities as $priority)
                        {
                            ?>

                            <option value="<?= $priority->id?>"><?= $priority->name?></option>
                            <?php

                        }

                        ?>
                    </select>

                    <!--Message-->
                    <div class="md-form">
                        <textarea name="message" id="materialContactFormMessage" class="form-control md-textarea" rows="3"></textarea>
                        <label for="materialContactFormMessage">Message</label>
                    </div>


                    <!-- Send button -->
                    <button class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" type="submit">Send</button>

                </form>
                <!-- Form -->

            </div>

        </div>
        <!-- Material form contact -->

    </form>



</div>

<?php
getFooter();