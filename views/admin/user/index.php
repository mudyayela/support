<?php

getHeader();
?>


<?php if (isset($success)) {

    echo  $success;

}
?>
<div class="container">


    <a href="<?= url('/users/add')?>" class="btn-floating btn-lg btn-success">Add New User</a>
    <?= getBack() ?>

    <table class="table table-striped table-boarded">

        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Type</th>
            <th>edit</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($users as $user) {
            ?>
            <tr>
                <td><?= $user->name?></td>
                <td><?= $user->email?></td>
                <td><?= $user->tell?></td>
                <td><?= $user->type?></td>
                <td>
                    <a
                            href="<?= url('users/edit?id='.$user->id)?>"
                    >Edit</a>
                </td>
            </tr>
            <?php

        }

        ?>
        </tbody>

    </table>
</div>

<?php

getFooter();