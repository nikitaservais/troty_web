<?php $title = 'Register'; ?>

<?php ob_start(); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <p class="h2">Inscription</p>
            <div class="form-group">
                <?php if ($userType == "recharge") { ?>
                    <a href="index.php?action=register&registerType=anonyme"><button class="btn btn-primary my-4">S'INSCRIRE</button></a>
                <?php } else { ?>
                    <a href="index.php?action=register&registerType=recharge"><button class="btn btn-primary my-4">DEVENIR UTILISATEUR RECHARGE
                        </button></a>
                <?php } ?>
                <?php if (isset($tryRegister) && $tryRegister) { ?>
                    <div class="alert alert-danger">Erreur dans l'enregistrement veillez réessayer</div>
                <?php } elseif (isset($tryRegister) && !$tryRegister) { ?>
                    <div class="alert alert-info">enregistrement réussi! Vous pouvez vous connecter</div>
                <?php } ?>
            </div>
            <form class="form-horizontal" action="index.php?action=register<?= "&registerType=". $userType ?>" method="post">
                <?php if (isset($_GET['registerType']) && !empty($_GET['registerType']) && $_GET['registerType'] == "recharge") { ?>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class="form-group">
                                <!-- First name -->
                                <input type="text" class="form-control" placeholder="First name" name="firstName" required>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class="form-group">
                                <!-- Last name -->
                                <input type="text" class="form-control" placeholder="Last name" name="lastName" required>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <!-- Password -->
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                    </div>
                </div>
                <?php if (isset($_GET['registerType']) && !empty($_GET['registerType']) && $_GET['registerType'] == "recharge") { ?>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class="form-group">
                                <!-- Phone number -->
                                <input type="text" class="form-control" placeholder="Phone number" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-3'>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Rue" name="street" required>
                            </div>
                        </div>
                        <div class='col-sm-3'>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Numéro" name="number" required>
                            </div>
                        </div>
                        <div class='col-sm-3'>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Code postal" name="cp" required>
                            </div>
                        </div>
                        <div class='col-sm-3'>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ville" name="city" required>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Bank account" name="bankAccount" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit">S'enregistrer</button>
                </div>
            </form>
            <hr>
            <div class="form-group">
                <a href="index.php?action=login"><button class="btn btn-info">Se connecter</button></a>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>