<?php $title = 'Login'; ?>

<?php ob_start(); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <p class="h2">Connexion</p>
            <div class="form-group">

                <?php if (isset($tryConnect) && $tryConnect) { ?>
                    <div class="alert alert-danger">Information incorrect</div>
                <?php } ?>
            </div>
            <form class="form-horizontal" action="index.php?action=login" method="post">
                <div class="form-group <?php if ($tryConnect) {
                                            echo "has-error has-feedback";
                                        } ?>">
                    <input type="text" name="username" class="form-control mb-4" placeholder="Username" required>
                    <?php if ($tryConnect) {
                        echo '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                    } ?>
                </div>
                <div class="form-group <?php if ($tryConnect) {
                                            echo "has-error has-feedback";
                                        } ?>">
                    <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
                    <?php if ($tryConnect) {
                        echo '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                    } ?>
                </div>
                <div class="form-group">
                    <!-- Sign in button -->
                    <button class="btn btn-info" type="submit">SE CONNECTER</button>
                </div>
                <hr>
            </form>
                    <div class="form-group">
                        <a href="index.php?action=register"><button class="btn btn-info my-4">S'INSCRIRE</button></a>
                    </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('nav/navDefault.php'); ?>
<?php require('footer/footerDefault.php'); ?>
<?php require('template.php'); ?>