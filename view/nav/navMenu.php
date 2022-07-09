<?php ob_start(); ?>

<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <?php if (isset($_SESSION['userType'])) { ?>
            <li><a href="index.php?action=scooterList">Liste des Trottinettes</a></li>
            <?php if($_SESSION['userType'] == 'mechanic') {?>
                <li><a href="index.php?action=complain">Plainte</a></li>
                <li><a href="index.php?action=userList">Liste des utilisateurs</a></li>
            <?php } ?>
        <?php } ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['username'])) {
             ?>
            <li><a href="index.php?action=myprofile"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['username'] ?></a></li>
             <li><a href="index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span> Déconnection</a></li>
             <?php
            } else {
            ?>
            <li><a href="index.php?action=register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            <li><a href="index.php?action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php
            } ?>
    </ul>
</div>


<?php $nav = ob_get_clean(); ?>