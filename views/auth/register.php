<?php
getHeader();

?>
<title>Register for free</title>


    <style>


        #register{
            display: grid;
            grid-template-columns: auto;
            grid-gap: 1em;
            min-width: 50%;
            padding-left: 5px;
            margin-left: 12em;
            margin-right:12em;
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
                margin-left: 0.2em;
                margin-bottom: 2em;
            }

        }
    </style>

<div id="register">


    <div class="container"></div>

    <div class="container">

        <form
                class="form-horizontal"
                action="<?= url('register/store')?>"
                method="post"
                id="register"
        >
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Sign up</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">


                        <div class="md-form mt-0 form-row">
                            <input type="text" name="name" id="register-name" required class="form-control">
                            <label for="materialRegisterFormEmail">Full Name</label>
                        </div>


                        <div class="md-form mt-0">
                            <input type="email" name="email" id="register-email" required class="form-control">
                            <label for="materialRegisterFormEmail">E-mail</label>
                        </div>

                        <div class="md-form mt-0">
                            <input type="text" name="phone_number" placeholder="+12345678908" id="register-phone" required class="form-control">
                            <label for="materialRegisterFormEmail">Phone Number</label>
                        </div>




                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" name="password" id="register-password" required class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                            <label for="materialRegisterFormPassword">Password</label>
                            <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                At least 8 characters and 1 digit
                            </small>
                        </div>





                        <!-- Newsletter -->
                        <div class="form-check">
                            <input type="checkbox" required class="form-check-input" id="register-agree">
                            <label class="form-check-label" for="materialRegisterFormNewsletter">By clicking
                                <em>Sign up</em> you agree to our Term and Password</label>
                        </div>




                        <!-- Sign up button -->
                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

                        <!-- Terms of service -->

                </div>

            </div>

        </form>

        <ion-alert-controller></ion-alert-controller>
    </div>
</div>
<?php


getFooter();


?>

<script>
    const name = document.querySelector('#register_name').value;
    const email = document.querySelector('#register_email').value;
    const phone = document.querySelector('#register_phone').value;
    const password = document.querySelector('#register_password').value;
    const agree = document.querySelector('#register_agree').value;
    const alertCr = document.querySelector('ion-alert-controller');


    if (name.trim().length < 1) {
        displayAlert('full name is required');

    }


    displayAlert(message) => {
        alertCr.create({
            message:  message,
            heading: invalid,
            buttons: ['OK']
        })

    }
</script>
