<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?action=home">FonTy</a>
        </div>
        <?php
        if (isset($nav)) {
            echo ($nav);
        } ?>
    </div>
</nav>

<body>
    <?= $content ?>
</body>
<footer class="navbar-default" style="background-color: black">
    <div class="container-fluid">
        <div class="footer-copyright text-center py-3" style="color:gray">© 2018-2019 Projet INFO-H-303:
                <span style="color:gray">Jawad, Yassim et Nikita</span>
            </div>
            <?php
    if (isset($footer)) {
        echo ($footer);
    } ?>
    </div>
</footer>

</html>