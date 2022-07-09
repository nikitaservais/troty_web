<?php $title = 'FonTy Trottinette éléctrique !'; ?>

<?php require('nav/navMenu.php'); ?>

<?php ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="col-sm-2">
                <div class="row">
                    <h2>Mon Profile</h2>
                </div>
                <ul class="nav nav-pills nav-stacked flex-column">
                    <li class="active"><a data-toggle="pill" href="#myinfo">Mes informations</a></li>
                    <?php if ($_SESSION['userType'] == "anonyme") { ?>
                        <li><a data-toggle="pill" href="#register">Devenir rechargeur</a></li>
                    <?php } ?>
                    <?php if ($_SESSION['userType'] != "mechanic") { ?>
                        <li><a data-toggle="pill" href="#history">Mon historique</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-sm-10">
                <div class="tab-content">
                    <div id="myinfo" class="tab-pane fade in active">
                        <?php if (isset($tryRegister) && $tryRegister) { ?>
                            <div class="alert alert-danger">Erreur dans l'enregistrement veillez réessayer</div>
                        <?php } elseif (isset($tryRegister) && !$tryRegister) { ?>
                            <div class="alert alert-info">enregistrement réussi! Vous pouvez maintenant recharger des trottinettes</div>
                        <?php } ?>
                        <?php require('view/myinfo.php'); ?>
                    </div>
                    <?php if ($_SESSION['userType'] == "anonyme") { ?>
                        <div id="register" class="tab-pane fade">
                            <?php require('view/upgradeUser.php'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION['userType'] != "mechanic") { ?>
                        <div id="history" class="tab-pane fade">
                            <?php require('view/history.php'); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>