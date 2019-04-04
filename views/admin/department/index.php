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

        <a class="btn-floating btn-lg purple-gradient" href="<?= url('/departments/create')?>">New Department</a>
<?= getBack()?>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Agents</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($departments as $department) {
                ?>
                <tr>
                    <td><?= $department->name ?></td>
                    <td><?= implode($department->departmentUsers->pluck('name')->toArray(),',') ?></td>
                    <td><a href="<?= url('departments/edit?id='. $department->id)?>">Edit</a> </td>
                    <td><a href="<?= url('departments/delete?id='. $department->id)?>">Delete</a> </td>
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