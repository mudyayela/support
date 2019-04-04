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
            <li><a href="<?= url('tickets/escalation-rules-new') ?>" class="'btn-floating btn-lg btn-success">New Rule</a></li>
            <li><a href="<?= url('tickets') ?>" class="'btn-floating btn-lg btn-success">Back</a></li>
        </ul>
        <!-- Card -->
        <div class="card">



            <!-- Card content -->
            <div class="card-body">

                <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Name
                        </th>
                        <th class="th-sm">Edit
                        </th>
                        <th class="th-sm">Delete
                        </th>


                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($rules  as $rule) {
                        ?>

                        <tr>
                            <td><?= $rule->name?></td>
                            <td><a href="<?= url('tickets/escalation-rules/edit?id='.$rule->id)?>">Edit</a> </td>
                            <td><a href="<?= url('tickets/escalation-rules/delete?id='.$rule->id)?>">Delete</a> </td>


                        </tr>
                        <?php

                    }
                    ?>


                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>
        <!-- Card -->
    </div>
<?php

getFooter();
?>
