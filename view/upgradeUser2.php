<?php $title = 'upgrade User'; ?>

<?php require('view/nav/navMenu.php'); ?>
<?php ob_start(); ?>
<div class="container text-center">

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <p class="h2">Upgrade un utilisateur</p>
            <div class="form-group">
                <?php if (isset($tryAcc) && $tryAcc) { ?>
                    <div class="alert alert-danger">Erreur trottinettes n'a pas été ajouté</div>
                <?php } elseif (isset($tryAcc) && !$tryAcc) { ?>
                    <div class="alert alert-info">Trottinette a été ajouté avec succes</div>
                <?php } ?>
            </div>
            <form class="form-horizontal" action="index.php?action=upgradeUser&userID=<?= $_GET['userID'] ?>" method="post">
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- First name -->
                            <input type="text" class="form-control" placeholder="Prénom" name="firstName" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Last name -->
                            <input type="text" class="form-control" placeholder="Nom" name="lastName" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Last name -->
                            <input type="text" class="form-control" placeholder="Téléphone" name="phone" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Last name -->
                            <input type="text" class="form-control" placeholder="Rue" name="street" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Last name -->
                            <input type="text" class="form-control" placeholder="Numéro" name="number" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Last name -->
                            <input type="text" class="form-control" placeholder="Code postal" name="cp" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Last name -->
                            <input type="text" class="form-control" placeholder="Ville" name="city" required>
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