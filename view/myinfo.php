<div class="row">
    <h2>Mes informations</h2>
</div>
<div class="row">
    <div class="col-sm-3 text-right">
        <label class="control-label">Statut : </label>
    </div>
    <div class="col-sm-4">
        <p class="form-control-static"><?= $_SESSION['userType'] ?></p>
    </div>
    <!-- <div class="col-sm-4">
        <button class="btn btn-info">Modifier</button>
    </div> -->
</div>
<hr>
<div class="row">
    <div class="col-sm-3 text-right">
        <label for="usr" class="control-label">Username : </label>
    </div>
    <?php if ($toEdit == "not") { ?>
        <div class="col-sm-4">
            <p id="usr" class="form-control-static"><?= $_SESSION['username'] ?></p>
        </div>
        <div class="col-sm-2">

            <a href=""><button class="btn btn-info">Modifier</button></a>
        </div>
    <?php } ?>
    <?php if ($toEdit == "username") { ?>
        <div class="col-sm-4">
            <input name="update_username" class="form-control">
        </div>
        <div class="col-sm-2">
            <a href=""><button type="submit" class="btn btn-info">Validers</button></a>
        </div>
    <?php } ?>
</div>
<hr>
<div class="row">
    <div class="col-sm-3 text-right">
        <label for="mdp" class="control-label">Mot de passe : </label>
    </div>
    <div class="col-sm-4">
        <p id="mdp" class="form-control-static">••••••••</p>
    </div>
    <div class="col-sm-4">
        <button class="btn btn-info">Modifier</button>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3 text-right">
        <label class="control-label">Banque N° : </label>
    </div>
    <div class="col-sm-4">
        <p class="form-control-static"><?= $_SESSION['bankAccount'] ?></p>
    </div>
    <div class="col-sm-2">
        <button class="btn btn-info">Modifier</button>
    </div>
</div>
<hr>
<?php if ($_SESSION['userType'] == "recharge" || $_SESSION['userType'] == 'mechanic') { ?>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label for="usr" class="control-label">Prénom : </label>
        </div>
        <div class="col-sm-4">
            <p id="usr" class="form-control-static"><?= $_SESSION['firstName'] ?></p>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-info">Modifier</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label for="mdp" class="control-label">Nom : </label>
        </div>
        <div class="col-sm-4">
            <p id="mdp" class="form-control-static"><?= $_SESSION['lastName'] ?></p>
        </div>
        <div class="col-sm-4">
            <button class="btn btn-info">Modifier</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label class="control-label">téléphone N° : </label>
        </div>
        <div class="col-sm-4">
            <p class="form-control-static"><?= $_SESSION['phone'] ?></p>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-info">Modifier</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label for="usr" class="control-label">Rue : </label>
        </div>
        <div class="col-sm-4">
            <p id="usr" class="form-control-static"><?= $_SESSION['adStreet'] ?></p>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-info">Modifier</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label for="mdp" class="control-label">Numéro : </label>
        </div>
        <div class="col-sm-4">
            <p id="mdp" class="form-control-static"><?= $_SESSION['adNumber'] ?></p>
        </div>
        <div class="col-sm-4">
            <button class="btn btn-info">Modifier</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label class="control-label">Code Postal : </label>
        </div>
        <div class="col-sm-4">
            <p class="form-control-static"><?= $_SESSION['adCP'] ?></p>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-info">Modifier</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label class="control-label">Ville : </label>
        </div>
        <div class="col-sm-4">
            <p class="form-control-static"><?= $_SESSION['adCity'] ?></p>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-info">Modifier</button>
        </div>
    </div>
    <hr>
<?php } ?>
<?php if ($_SESSION['userType'] == 'mechanic') { ?>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label class="control-label">Date d'embauche : </label>
        </div>
        <div class="col-sm-4">
            <p class="form-control-static"><?= $_SESSION['hireDate'] ?></p>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-info">Modifier</button>
        </div>
    </div>
<?php } ?>