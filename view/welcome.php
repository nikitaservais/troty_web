<?php $title = 'FonTy Trottinette éléctrique !'; ?>

<?php require('nav/navMenu.php'); ?>



<?php ob_start(); ?>
<div class="container-fluid">
    <?php if (isset($tryInitDB) && $tryInitDB) { ?>
        <div class="alert alert-danger">Erreur database n'a pas été créé ou la database existe déjà</div>
    <?php } elseif (isset($tryInitDB) && !$tryInitDB) { ?>
        <div class="alert alert-info">Création de la database est réussie</div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <div class="panel-group" id="requestList">
                <h1>Projet Info-H-303: Trottinettes </h1>
                <h2>Deuxième partie</h2>
                <p>
                    Ici vous pouvez retrouver les différentes opérations qui ont été demandé pour la deuxième partie :
                </p>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel-title">Créer la database et l'initialisé avec les données fournies</div>
                                    <div class="panel-body"><a href="index.php?action=loadDB" class="btn btn-success" role="button">Executer</a></div>
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-1"><span>
                                </div>
                                <div class="col-sm-1 text-right"><a href="#item1" data-toggle="collapse" data-parent="#requestList">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="item1" class="panel-collapse collapse">
                        <div class="container-fluid">
                            <h4>Description</h4>
                            <p>
                                Création de la base de données et de ses différentes tables et importation dans la base de données les données présentes dans des fichiers qui sont fournis
                            </p>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['userType']) && !empty($_SESSION['userType'] && $_SESSION['userType'] == 'mechanic')) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="panel-title">R1</div>
                                        <div class="panel-body"><a href="index.php?action=request&number=1" class="btn btn-success" role="button">Executer</a></div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-1"><span>
                                    </div>
                                    <div class="col-sm-1 text-right"><a href="#R1" data-toggle="collapse" data-parent="#requestList">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="R1" class="panel-collapse collapse">
                            <div class="container-fluid">
                                <h4>Description</h4>
                                <p>La liste et la localisation des trottinettes actuellement disponibles</p>
                            </div>
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="panel-title">R2</div>
                                        <div class="panel-body"><a href="index.php?action=request&number=2" class="btn btn-success" role="button">Executer</a></div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-1"><span>
                                    </div>
                                    <div class="col-sm-1 text-right"><a href="#R2" data-toggle="collapse" data-parent="#requestList">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="R2" class="panel-collapse collapse">
                            <div class="container-fluid">
                                <h4>Description</h4>
                                <p>La liste des utilisateurs avant utilisé toutes les trottinettes qu'ils ont rechargées</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="panel-title">R3</div>
                                        <div class="panel-body"><a href="index.php?action=request&number=3" class="btn btn-success" role="button">Executer</a></div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-1"><span>
                                    </div>
                                    <div class="col-sm-1 text-right"><a href="#R3" data-toggle="collapse" data-parent="#requestList">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="R3" class="panel-collapse collapse">
                            <div class="container-fluid">
                                <h4>Description</h4>
                                <p>La trotinnette ayant effectué la plus grande distance depuis sa mise en service</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="panel-title">R4</div>
                                        <div class="panel-body"><a href="index.php?action=request&number=4" class="btn btn-success" role="button">Executer</a></div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-1"><span>
                                    </div>
                                    <div class="col-sm-1 text-right"><a href="#R4" data-toggle="collapse" data-parent="#requestList">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="R4" class="panel-collapse collapse">
                            <div class="container-fluid">
                                <h4>Description</h4>
                                <p>Les trottinettes ayant déjà fait l'objet d'au moins une dizaine de plaintes</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="panel-title">R5</div>
                                        <div class="panel-body"><a href="index.php?action=request&number=5" class="btn btn-success" role="button">Executer</a></div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-1"><span>
                                    </div>
                                    <div class="col-sm-1 text-right"><a href="#R5" data-toggle="collapse" data-parent="#requestList">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="R5" class="panel-collapse collapse">
                            <div class="container-fluid">
                                <h4>Description</h4>
                                <p>Les utilisateurs ayant déjà réalisé au moins 10 trajets avec pour chaque utilisateur concerné :
                                    la durée moyenne de ses trajets en trottinette, le nombre total de trajets réalisés,
                                    le montant total dépensé en trajets</p>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <h3>Veillez vous connectez entant que mecanicien pour pouvoir executer les réquêtes</h3>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>