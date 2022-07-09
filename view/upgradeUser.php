<div class="row">
    <h2>Devenir un rechargeur</h2>
</div>

<form class="form-horizontal" action="index.php?action=myprofile" method="post">
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
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <button class="btn btn-info" type="submit">Envoyer</button>
            </div>
        </div>
    </div>
</form>