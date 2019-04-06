<?php
getHeader();

?>
<style>
    .container{

        margin-bottom: 2em;
    }

    @media screen and (min-height: 700px) {
        form{
            display: grid;
            grid-template-columns: auto;
            grid-gap: 1em;
        }
    }
    .text-area{
        width: 400px;
        height: 900px;
    }
    h2{
        text-align: left; border-bottom-style: solid; display: grid; grid-gap: 1em
    }
    legend{
        text-align: left; border-bottom-style: solid; display: grid; grid-gap: 1em
    }
    ul li {
        display: block;
    }
</style>

<div id="container" class="container">

    <ul>
        <li><a href="<?= url('tickets/escalation-rules')?>" class="btn btn-floating btn-primary">Back</a> </li>
    </ul>

    <!-- Material form login -->
    <div class="card">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>New Escalation Rule</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" method="post"  action="<?= url('/tickets/escalate/store')?>" style="color: #757575;">


                <input
                    type="hidden"
                    name="id"
                    value="<?= $rule->id    ?>"
                >


                <div class="col-md-12">

                    <div class="form-group">
                        <div class="col-md-4">

                            <!-- Name -->
                            <div class="md-form mt-3">
                                <input type="text"
                                       id="materialContactFormName"
                                       class="form-control"
                                       name="name"
                                       value="<?= $rule->name?>"
                                >
                                <label for="materialContactFormName">Name</label>
                            </div>

                        </div>
                    </div>
                    <fieldset>
                        <h2>Conditions</h2>
                        <div class="form-group">
                            <div class="col-md-4">
                                <!-- Subject -->
                                <span>Priority</span>
                                <select class="mdb-select form-control" name="rule_priority_id">
                                    <?php
                                    foreach ($priorities as $priority) {

                                        ?>

                                        <option
                                            value="<?= $priority->id?>"
                                            <?= ($rule->priority_id == $priority->id) ? "selected": ""?>
                                        ><?= $priority->name?></option>
                                        <?php

                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <!-- Subject -->
                                <span>Department</span>
                                <select class="mdb-select form-control" name="rule_department_id">
                                    <?php
                                    foreach ($departments as $department) {

                                        ?>

                                        <option
                                            value="<?= $department->id?>"
                                            <?= ($rule->department_id == $department->id) ? "selected": ""?>
                                        ><?= $department->name?></option>
                                        <?php

                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <!-- Subject -->
                                <span>Subject</span>
                                <select class="mdb-select form-control" name="rule_status">

                                    <?php
                                    foreach (ticketStatuses() as $status) {

                                        ?>

                                        <option
                                            value="<?= $status?>"
                                            <?= ($rule->status == $status) ? "selected": ""?>
                                        ><?= $status?></option>
                                        <?php

                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </fieldset>

                </div>

                <div class="col-md-12">

                   <fieldset>
                       <legend>Action</legend>
                       <div class="form-group">
                           <div class="col-md-4">
                               <!-- Subject -->
                               <span>Priority</span>
                               <select class="mdb-select form-control" name="priority_id">
                                   <?php
                                   foreach ($priorities as $priority) {

                                       ?>

                                       <option
                                           value="<?= $priority->id?>"
                                           <?= ($rule->action->priority_id == $priority->id) ? "selected": ""?>
                                       ><?= $priority->name?></option>
                                       <?php

                                   }
                                   ?>

                               </select>

                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-4">
                               <!-- Subject -->
                               <span>Department</span>
                               <select class="mdb-select form-control" name="department_id">
                                   <?php
                                   foreach ($departments as $department) {

                                       ?>

                                       <option
                                           value="<?= $department->id?>"
                                           <?= ($rule->action->department_id == $department->id) ? "selected": ""?>
                                       ><?= $department->name?></option>
                                       <?php

                                   }
                                   ?>
                               </select>

                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-4">
                               <!-- Subject -->
                               <span>Status</span>
                               <select class="mdb-select form-control" name="status">

                                   <?php
                                   foreach (ticketStatuses() as $status) {

                                       ?>

                                       <option
                                           value="<?= $status?>"
                                           <?= ($rule->status == $status) ? "selected": ""?>
                                       ><?= $status?></option>
                                       <?php

                                   }
                                   ?>

                               </select>

                           </div>
                       </div>


                       <div class="form-group">
                           <div class="col-md-4">
                               <!-- Subject -->
                               <span>Flag To</span>
                               <select class="mdb-select form-control" name="user_id">

                                   <?php
                                   foreach ($users as $user) {

                                       ?>

                                       <option
                                           value="<?= $user->id?>"
                                           <?= ($rule->action->user_id == $user->id) ? "selected": ""?>
                                       ><?= $user->name .' ('.$user->type.')' ?></option>
                                       <?php

                                   }
                                   ?>

                               </select>

                           </div>
                       </div>


                       <div class="form-group">
                           <div class="col-md-4">

                               <!-- Name -->
                               <div class="md-form mt-3">
                                   <input type="checkbox"
                                          id="materialContactFormName"
                                          class="form-control"
                                          name="notify"
                                       <?= $rule->action->notify ? "checked" : ""?>
                                   >
                                   <label for="materialContactFormName">Notify User</label>
                               </div>

                           </div>
                       </div>

                       <div class="form-group">
                           <div class="col-md-4">
                               <!-- Subject -->
                               <span>Message</span>


                               <textarea
                                   class="form-control text-area"
                                   name="message"
                                   rows="6"
                               ><?= $rule->action->message?></textarea>

                           </div>
                       </div>

                   </fieldset>


                </div>

                <!-- Send button -->
                <button class="btn btn-outline-info btn-rounded  z-depth-0 my-4 waves-effect" type="submit">Submit</button>

            </form>
            <!-- Form -->

        </div>

    </div>
    <!-- Material form login -->
</div>



<?php

getFooter();
