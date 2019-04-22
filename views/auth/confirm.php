<?php getHeader();


?>
<style>
    button {
        margin-top: 20px;
        align-content: center;
    }

    form {
        min-height: 79vh;
    }
</style>

<form
        method="post"
        id="postThisForm"
        action="<?= url('/verify') ?>"
        class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-md-2"> Enter the code </label>
        <div class="col-md-4">
            <input
                    type="text"
                    name="code"
                    id="code"
                    class="form-control"
            >
        </div>
        <div class="form-group">
            <button type="button" id="confirm" class="btn btn-success">Confirm</button>
        </div>
    </div>
    <ion-alert-controller></ion-alert-controller>
    <ion-toast-controller></ion-toast-controller>
    <ion-loading-controller></ion-loading-controller>
</form>

<?php

getFooter();
?>
<script>
    const confirm = document.querySelector('#confirm');
    const form = document.querySelector('#postThisForm');
    const code = document.querySelector('#code');
    const alert = document.querySelector('ion-alert-controller');
    const toast = document.querySelector('ion-toast-controller');
    const loading = document.querySelector('ion-loading-controller');
    confirm.addEventListener('click', () => {
        if (code.value.trim().length < 1) {
            alert.create({
                message: "Enter the code to confirm",
                heading: "Invalid Code",
                buttons: ['OK']
            }).then(alertElement => {
                alertElement.present();

            });
            return;
        }
       document.getElementById('postThisForm').submit();
    })
</script>

