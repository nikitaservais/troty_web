<?php $title = 'Register'; ?>

<?php require('view/nav/navMenu.php'); ?>
<?php ob_start(); ?>
<div class="container text-center">

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <p class="h2">Formulaire de réparation</p>
            <div class="form-group">
                <?php if (isset($tryAcc) && $tryAcc) { ?>
                    <div class="alert alert-danger">Erreur formulaire n'a pas été envoyé</div>
                <?php } elseif (isset($tryAcc) && !$tryAcc) { ?>
                    <div class="alert alert-info">Réparation est terminé avec succes</div>
                <?php } ?>
            </div>
            <form class="form-horizontal" action="index.php?action=acceptComplain&complainID=<?= $_GET['complainID'] ?>&button=send" method="post">
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- First name -->
                            <textarea type="text" class="form-control" placeholder="Note" name="note" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit">Envoyer</button>
                </div>
            </form>
            <hr>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>