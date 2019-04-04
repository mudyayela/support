<?php getHeader()
?>
<style>
    #body > .container{
       height: 100%;
    }
    .container{
        padding: 2em;
    }
</style>
<title>Admin Dashboard</title>
<div id="body">
    <div class="container">

        <a href="<?= url('tickets')?>" class="btn peach-gradient">Tickets</a>
        <a href="<?= url('users')?>" class="btn peach-gradient">Users</a>
        <a  href="<?= url('departments')?>" class="btn peach-gradient">Support Departments</a>
        <a  href="<?= url('products')?>" class="btn peach-gradient">Products</a>

    </div>
</div>



<?php getFooter()?>

