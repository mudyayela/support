<?php
getHeader();

?>

<style>
    .container{
        margin: 12px;
        padding: 2em;
        min-height: 100%;
    }
</style>

<div class="container">


    <?php
    if ( isset($_SESSION['user']) && $_SESSION['type'] == 'admin')
    {
        ?>


        <a class="btn-floating btn-lg " href="<?= url('/tickets/escalation-rules')?>">Escalation Rules</a>
        <?php echo getBack() ?>

        <?php

    }
    if (isset($_SESSION['client'])){
        ?>

        <a class="btn-floating btn-lg " href="<?= url('/tickets/add')?>">New Ticket</a>
        <?php
    }
    ?>



    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Created At</th>
            <th>Subject</th>
            <th>Department</th>
            <th>Priority</th>
            <th>status</th>
            <th>view</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tickets as $ticket) {
            ?>
            <tr>
                <td><?= $ticket->created_at ?></td>
                <td><?= $ticket->subject ?></td>
                <td><?= $ticket->department->name ?></td>
                <td><?= $ticket->priority->name ?></td>
                <td><?= $ticket->status ?></td>
                <td><a href="<?= url('tickets/view?id='.$ticket->id)?>" class="btn btn-primary">View</a> </td>
            </tr>
            <?php
        }
            ?>
        </tbody>
    </table>
</div>


<?php

getFooter();

?>