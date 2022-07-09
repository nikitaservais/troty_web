<?php $title = 'Liste des trottinettes'; ?>

<?php ob_start(); ?>
<div class="container-fluid">
    <?php if (isset($tryComplain) && $tryComplain) { ?>
        <div class="alert alert-danger">Erreur plainte non enregister</div>
    <?php } elseif (isset($tryComplain) && !$tryComplain) { ?>
        <div class="alert alert-info">Votre plainte a été enregistré</div>
    <?php } ?>
    <?php if (isset($tryRecharge) && $tryRecharge) { ?>
        <div class="alert alert-danger">Erreur recharge n'a pas été commencé</div>
    <?php } elseif (isset($tryRecharge) && !$tryRecharge) { ?>
        <div class="alert alert-info">Recharge a été enregistré</div>
    <?php } ?>
    <?php if (isset($tryDelete) && $tryDelete) { ?>
        <div class="alert alert-danger">Erreur la trottinette n'a pas été supprimé</div>
    <?php } elseif (isset($tryDelete) && !$tryDelete) { ?>
        <div class="alert alert-info">Trottinette a été supprimé</div>
    <?php } ?>
    <?php if (isset($tryStatus) && $tryStatus) { ?>
        <div class="alert alert-danger">Erreur le status n'a pas été mis à jour</div>
    <?php } elseif (isset($tryStatus) && !$tryStatus) { ?>
        <div class="alert alert-info">Le status de la trottinette à été mis à jour</div>
    <?php } ?>
    <div class="panel-group" id="scooterList">
        <?php if ($_SESSION['userType'] == 'mechanic') { ?>
            <a href="index.php?action=addScooter" class="btn btn-primary" role="button">Ajouter une Trottinette</a>
        <?php } ?>
        <?php if ($_SESSION['userType'] == 'recharge') { ?>
            <h3>Trottinette que vous rechargez</h3>
            <?php while ($scooterRecharge = $scootersRecharge->fetch()) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="panel-title">Trottinette N°<?= $scooterRecharge[1] ?></div>
                                </div>
                                <div class="col-sm-7"></div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-1 text-right">
                                    <a href="#item<?= $scooterRecharge[0] ?>" data-toggle="collapse" data-parent="#scooterList">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="panel-body"><a href="index.php?action=endReload&reloadID=<?= $scooterRecharge[0] ?>&scooterID=<?= $scooterRecharge[1] ?>" class="btn btn-success" role="button">Fin de charge</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="item<?= $scooterRecharge[0] ?>" class="panel-collapse collapse">
                        <div class="container-fluid">
                            <h4>Description</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Init charge</th>
                                        <th>sourcex</th>
                                        <th>sourceY</th>
                                        <th>Date de debut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $scooterRecharge[2] ?></td>
                                        <td><?php if ($scooterRecharge[3]) {
                                                echo "oui";
                                            } else {
                                                echo "non";
                                            } ?></td>
                                        <td><?= $scooterRecharge[4] ?></td>
                                        <td><?= $scooterRecharge[5] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            <?php } ?>
        <?php } ?>
        <h3>Trottinette disponible</h3>
        <?php while ($scooter = $scooters->fetch()) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="panel-title">Trottinette N°<?= $scooter[0] ?></div>
                            </div>
                            <div class="col-sm-7"></div>
                            <div class="col-sm-1"><span>X: <?= $scooter[5] ?> Y:<?= $scooter[6] ?></span>
                            </div>
                            <div class="col-sm-1 text-right">
                                <a href="#item<?= $scooter[0] ?>" data-toggle="collapse" data-parent="#scooterList">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="panel-body"><a href="index.php?action=scooterList&button=reserve&scooter[]=<?= $scooter[0] ?>" class="btn btn-success" role="button">Réserver</a></div>
                            </div>
                            <?php if ($_SESSION['userType'] == "recharge") { ?>
                                <div class="col-sm-1">
                                    <div class="panel-body"><a href="index.php?action=scooterList&button=recharge&scooterID=<?= $scooter[0] ?>&initLoad=<?= $scooter[3] ?>&positionX=<?= $scooter[5] ?>&positionY=<?= $scooter[6] ?>" class="btn btn-success" role="button">Recharger</a></div>
                                </div>
                            <?php } ?>
                            <?php if ($_SESSION['userType'] == "mechanic") { ?>
                                <div class="col-sm-1">
                                    <?php if ($scooter[7]) { ?>
                                        <div class="panel-body"><a href="index.php?action=scooterList&button=available&scooterID=<?= $scooter[0] ?>" class="btn btn-success" role="button">Disponible</a></div>
                                    <?php } else { ?>
                                        <div class="panel-body"><a href="index.php?action=scooterList&button=unavailable&scooterID=<?= $scooter[0] ?>" class="btn btn-danger" role="button">Indisponible</a></div>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-1">
                                    <div class="panel-body"><a href="index.php?action=scooterList&button=delete&scooterID=<?= $scooter[0] ?>" class="btn btn-danger" role="button">Supprimer</a></div>
                                </div>
                            <?php } ?>
                            <div class="col-sm-8"></div>
                            <div class="col-sm-1 text-right">
                                <?php if (!($_SESSION['userType'] == 'mechanic')) { ?>
                                    <div class="panel-body"><a href="index.php?action=scooterList&button=complain&scooterID=<?= $scooter[0] ?>" class="btn btn-warning" role="button">Signaler</a></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="item<?= $scooter[0] ?>" class="panel-collapse collapse">
                    <div class="container-fluid">
                        <h4>Description</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Modèle</th>
                                    <th>Plainte</th>
                                    <th>Charge</th>
                                    <th>Mise en service</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $scooter[1] ?></td>
                                    <td><?php if ($scooter[2]) {
                                            echo "oui";
                                        } else {
                                            echo "non";
                                        } ?></td>
                                    <td><?= $scooter[3] ?></td>
                                    <td><?= $scooter[4] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('nav/navMenu.php'); ?>
<?php require('template.php'); ?>