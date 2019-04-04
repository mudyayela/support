<?php
getHeader();

?>

<style>

</style>
    <div class="container">

        <?php
        echo getBack()
        ?>
        <!-- Material form contact -->
        <div class="card">

            <h5 class="card-header info-color white-text text-center py-3">
                <strong>New Customer</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">


                <form
                        class="form"
                        method="post"
                        action="<?= url('users/store') ?>"
                >
                    <input type="hidden" name="id" value="<?= $user->id ?>">

                    <div class="form-group">
                        <label class="control-label">Name: </label>

                        <div class="col-md-4">
                            <input
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    value="<?= $user->name ?>"
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email: </label>

                        <div class="col-md-4">
                            <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    value="<?= $user->email ?>"
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tel: </label>

                        <div class="col-md-4">
                            <input
                                    name="tel"
                                    class="form-control"
                                    type="tel"
                                    value="<?= $user->tell ?>"
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">User Type: </label>

                        <div class="col-md-4">
                            <select
                                    name="type"
                            >
                                <option value="admin"

                                    <?php
                                    if ($user->type === "admin") {

                                        echo "selected";
                                    }

                                    ?>
                                >

                                    Admin
                                </option>
                                <option
                                        value="agent"
                                    <?php
                                    if ($user->type === "agent") {

                                        echo "selected";
                                    }

                                    ?>

                                >
                                    Agent
                                </option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password: </label>

                        <div class="col-md-4">
                            <input
                                    name="password"
                                    type="password"
                                    required
                                    class="form-control"
                            >
                        </div>
                    </div>
                    <div class="form-group">

                        <button
                                type="submit"
                                class="btn btn-success"
                        >
                            <?php if (!is_null($user->id)) {
                                echo " Update ";
                            } else {
                                echo "Add";
                            } ?>
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>

<?php

getFooter()

?>