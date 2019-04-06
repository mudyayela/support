<?php
getHeader();
?>

<style>
    .container{
        margin: 20px;
    }
    #ticket-details{
        display: grid;
        grid-template-columns: 70% auto;
        grid-gap: 1em;
        padding: 1em;
    }

    ul.reply-heading li {
        display: inline;
        padding: 0.3em;
    }

    ul.ticket-information li{
        display: block;
        border-bottom: solid 1px;
        padding: 0.3em;
    }


    @media screen and (max-width :720px) {

        #ticket-details{
            display: grid;
            grid-template-columns: auto;
            grid-gap: 1em;
            padding: 1em;
        }
    }

    @media screen and (min-width :720px) {

        #ticket-details{
            display: grid;
            grid-template-columns: 50 % auto;
            grid-gap: 1em;
            padding: 1em;
        }
    }

    #ticket-details .discussion:nth-child(odd){

        background: #cccccc;
    }

    #ticket-details .discussion:nth-child(even){

        background: #fff;
    }

    .panel-heading{
        background: #cccccc;
        padding: 1em;
        margin-top: 1em;
    }
    div.panel-heading:nth-child(even){
        background: #fff;
        padding: 1em;
        margin-top: 1em;
    }
    .panel-boady{
        background: #cccccc;
        padding: 2em;
        margin-top: 2em;
    }

</style>
<div class="container">


    <div class="content">
        <?= getBack()?>

    </div>

    <div id="ticket-details">
        <div class="ticket-item">


            <?php

            if (is_null($ticket->closed_at))
            {
                ?>
                <!-- Material form register -->
                <div class="card">

                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Reply</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">

                        <!-- Form -->
                        <form
                            class="text-center"
                            method="post"
                            action="<?= url('tickets/reply')?>"
                            style="color: #757575;"
                        >
                            <input
                                type="hidden"
                                name="id"
                                value="<?= $ticket->id?>"
                            >

                            <div class="form-row">
                                <div class="col">
                                    <!--Message-->
                                    <div class="md-form">
                                        <textarea
                                            id="materialContactFormMessage"
                                            class="form-control md-textarea"
                                            name="message"
                                            rows="3"></textarea>
                                        <label for="materialContactFormMessage">Message</label>
                                    </div>
                                </div>

                            </div>

                            <!-- Sign up button -->
                            <button class="btn btn-outline-info btn-rounded  my-4 waves-effect z-depth-0" type="submit">Send</button>


                        </form>
                        <!-- Form -->

                    </div>

                </div>
                <!-- Material form register -->
                <?php

            }

            foreach ($ticket->discussions as $discussion) {

                $title =  ($discussion->userable instanceof \App\Model\User) ? "Agent" :"Client";;

                ?>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <ul class="reply-heading">
                                <li><?=  $title .' ' .$discussion->userable->name ?></li>
                                <li><?= $discussion->created_at ?></li>
                            </ul>
                        </h5>

                    </div>
                    <div class="panel panel-body discussion">
                        <p>
                            <?= $discussion->message ?>

                        </p>
                    </div>
                </div>
                <?php

            }



            ?>


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <ul class="reply-heading">
                        <li> Client <?= $ticket->client->name ?></li>
                        <li><?= $ticket->created_at ?></li>
                    </ul>

                </div>
                <div class="panel panel-body">
                    <p>
                        <?= $ticket->message ?>

                    </p>
                </div>
            </div>
        </div>

        <div class="ticket-item">
            <div class="panel panel-success">
                <div class="panel-heading card-header info-color white-text text-center py-4"">
                    <h5 class="panel-title">
                        Ticket information
                    </h5>
                </div>
                <div class="panel panel-body">
                    <ul class="ticket-information">
                        <?php
                        if ($_SESSION['type'] != 'client'){
                            ?>
                            <li><a href="<?= url('/tickets/escalate?id='.$ticket->id)?>" class="badge badge-warning">Escalate this Issue
                                    <br>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li>#<?= $ticket->id?>  <?= $ticket->subject?>
                            <span class="<?= $ticket->closed_at ? "class='badge badge-inverse'" : "class='badge badge-primary'"?>"
                        </li>
                        <li>Status<br>
                            <span class="badge badge-<?= $ticket->status == 'closed' ? "danger" : "success"?>"><?= $ticket->status?></span>
                        </li>
                        <li>Department<br>
                            <?= $ticket->department->name?>
                        </li>
                        <li>Submitted<br>
                            <?= $ticket->created_at?>
                        </li>
                        <li>Last Updated<br>
                            <?= $ticket->updated_at?>
                        </li>
                        <li>Priority<br>
                            <?= $ticket->priority->name?>
                        </li>
                        <?php if (is_null($ticket->closed_at)){

                            ?>
                            <li>
                                <a href="<?= url('tickets/close?id='. $ticket->id)?>" class="badge badge-success">Close</a>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                            <li>
                                <a href="<?= url('tickets/open?id='. $ticket->id)?>" class="badge badge-success">Open</a>
                            </li>
                            <?php

                        }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
getFooter();