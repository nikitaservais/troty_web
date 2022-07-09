<?php $title = 'Register'; ?>

<?php require('view/nav/navMenu.php'); ?>
<?php ob_start(); ?>
<div class="container text-center">

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <p class="h2">Ajouter une trottinette</p>
            <div class="form-group">
                <?php if (isset($tryEnd) && $tryEnd) { ?>
                    <div class="alert alert-danger">Erreur trottinettes n'a pas été ajouté</div>
                <?php } elseif (isset($tryEnd) && !$tryEnd) { ?>
                    <div class="alert alert-info">Trottinette a été ajouté avec succes</div>
                <?php } ?>
            </div>
            <form class="form-horizontal" action="index.php?action=endReload&reloadID=<?= $_GET['reloadID'] ?>&scooterID=<?= $_GET['scooterID'] ?>" method="post">
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- First name -->
                            <input type="text" class="form-control" placeholder="Charge finale" name="finalLoad" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Last name -->
                            <input type="text" class="form-control" placeholder="Position finale X" name="positionX" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Last name -->
                            <input type="text" class="form-control" placeholder="Position finale Y" name="positionY" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit">Ajouter</button>
                </div>
            </form>
            <hr>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>