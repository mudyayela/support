<?php getHeader()
?>
<style>
    #body .container{
        height: 76vh;
    }
    .container{
        padding: 2em;
    }
</style>

<title>Client Dashboard</title>
<div id="body">
    <div class="container">

        <a href="<?= url('tickets')?>" class="btn peach-gradient">Tickets</a>
    </div>
</div>



<?php getFooter()?>

