<?php $title = 'FonTy Trottinette éléctrique !'; ?>

<?php require('nav/navMenu.php'); ?>



<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <h2>Requête N°<?= $_GET['number'] ?></h2>
        <?php switch ($_GET['number']) {
            case "1":
                echo "<p>La liste et la localisation des trottinettes actuellement disponibles.<p>";
                break;
            case "2":
                echo "<p>La liste des utilisateurs avant utilisé toutes les trottinettes qu'ils ont rechargées.<p>";
                break;
            case "3":
                echo "<p>La trotinnette ayant effectué la plus grande distance depuis sa mise en service.<p>";
                break;
            case "4":
                echo "<p>Les trottinettes ayant déjà fait l'objet d'au moins une dizaine de plaintes.<p>";
                break;
            case "5":
                echo "<p>Les utilisateurs ayant déjà réalisé au moins 10 trajets avec pour chaque utilisateur concerné : la durée moyenne de ses trajets en trottinette, le nombre total de trajets réalisés, le montant total dépensé en trajets (sans prise en compte de l'argent gagné par les recharges éventuelles de trottinettes).<p>";
                break;
        } ?>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                <?php switch ($_GET['number']) {
                    case "1":
                        echo "<th>Trottinette N°</th><th>Position X</th><th>Position Y</th>";
                        break;
                    case "2":
                        echo "<th>Trottinette N°</th><th>Distance</th>";
                        break;
                    case "3":
                        echo "<th>Trottinette N°</th><th>Distance</th>";
                        break;
                    case "4":
                        echo "<th>Trottinette N°</th><th>Nombre de plainte</th>";
                        break;
                    case "5":
                        echo "<th>Trottinette N°</th><th>Distance</th>";
                        break;
                } ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($info = $infos->fetch()) { ?>
                    <tr>
                        <td><?= $info[0] ?></td>
                        <td><?= $info[1] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>