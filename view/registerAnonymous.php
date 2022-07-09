<?php $title = 'Register anonymous user'; ?>

<?php ob_start(); ?>
<div class="container text-center">
    <p class="h4">Inscription anonymement</p>
    <form class="form-horizontal">
        <div class="form-group">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control" placeholder="Bank account" required>
        </div>
        <div class="form-group">
            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Register</button>
        </div>
        <div class="form-group">
            <p>Inscription 
                <a href="index.php?action=register"><span class="glyphicon glyphicon-user"></span></a>
            </p>
        </div>
        <hr>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>