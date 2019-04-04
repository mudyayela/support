<?php
getHeader();

?>
<title>Register or rign up for free</title>


    <style>


        #register{
            display: grid;
            grid-template-columns: auto;
            grid-gap: 1em;
            min-width: 40%;
            padding-left: 5px;
            margin-left: 25em;
            margin-right: 60em;
            margin-bottom: 2em;
        }

        @media screen and (max-width: 1200px){

            #register{
                display: grid;
                grid-template-columns: auto;
                grid-gap: 1em;
                min-width: 50%;
                max-width: 100%;
                padding-left: 5px;
                margin-left: 20em;
                margin-right: 20em;
                margin-bottom: 2em;
            }

        }

        @media screen and (max-width: 1100px){

            #register{
                display: grid;
                grid-template-columns: auto;
                grid-gap: 1em;
                min-width: 20%;
                max-width: 50%;
                padding-left: 5px;
                margin-left: 7em;
                margin-right: 0.2em;
                margin-bottom: 2em;
            }

        }
        @media screen and (max-width: 800px){

            #register{
                display: grid;
                grid-template-columns: auto;
                grid-gap: 1em;
                min-width: 50%;
                padding-left: 5px;
                margin-left: 10em;
                margin-right: 8em;
                margin-bottom: 2em;
            }

        }
        @media screen and (max-width: 652px){

            #register{
                display: grid;
                grid-template-columns: auto;
                grid-gap: 1em;
                min-width: 100%;
                padding-left: 5px;
                margin-left: 0.2em;
                margin-bottom: 2em;
            }

        }
    </style>

<div id="register">


    <div class="container">

        <form
                class="form-horizontal"
                action="<?= url('register/store')?>"
                method="post"
        >
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Sign up</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;">

                        <div class="md-form mt-0 form-row">
                            <input type="text" name="name" id="materialRegisterFormEmail" class="form-control">
                            <label for="materialRegisterFormEmail">Full Name</label>
                        </div>


                        <div class="md-form mt-0">
                            <input type="email" name="email" id="materialRegisterFormEmail" class="form-control">
                            <label for="materialRegisterFormEmail">E-mail</label>
                        </div>

                        <div class="md-form mt-0">
                            <input type="text" name="phone_number" id="materialRegisterFormEmail" class="form-control">
                            <label for="materialRegisterFormEmail">Phone Number</label>
                        </div>




                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" name="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                            <label for="materialRegisterFormPassword">Password</label>
                            <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                At least 8 characters and 1 digit
                            </small>
                        </div>





                        <!-- Newsletter -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="materialRegisterFormNewsletter">
                            <label class="form-check-label" for="materialRegisterFormNewsletter">By clicking
                                <em>Sign up</em> you agree to our</label>
                        </div>




                        <!-- Sign up button -->
                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

                        <!-- Terms of service -->

                    </form>
                    <!-- Form -->

                </div>

            </div>

        </form>

    </div>
</div>
<?php


getFooter();

?>