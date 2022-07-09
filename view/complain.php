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
    <div class="panel-group" id="scooterList">
        <?php while ($complain = $complains->fetch()) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="panel-title">Trottinette N°<?= $complain[1] ?></div>
                            </div>
                            <div class="col-sm-7"></div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-1 text-right">
                                <a href="#item<?= $complain[0] ?>" data-toggle="collapse" data-parent="#scooterList">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="panel-body"><a href="index.php?action=acceptComplain&complainID=<?= $complain[0] ?>" class="btn btn-success" role="button">Accepter</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="item<?= $complain[0] ?>" class="panel-collapse collapse">
                    <div class="container-fluid">
                        <h4>Description</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>N° de plainte</th>
                                    <th>User</th>
                                    <th>Date de la plainte</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $complain[0] ?></td>
                                    <td><?= $complain[2] ?></td>
                                    <td><?= $complain[3] ?></td>
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