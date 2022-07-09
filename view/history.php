<table class="table table-hover">
    <thead>
        <tr>
            <th>Debut</th>
            <th>Fin</th>
            <th>Position X de départ</th>
            <th>Position Y de départ</th>
            <th>Position X d'arriver</th>
            <th>Position Y d'arriver</th>
            <th>Distance</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($userHistory = $userHistorys->fetch()) {?>
        <tr>
            <td><?= $userHistory[0] ?></td>
            <td><?= $userHistory[1] ?></td>
            <td><?= $userHistory[2] ?></td>
            <td><?= $userHistory[3] ?></td>
            <td><?= $userHistory[4] ?></td>
            <td><?= $userHistory[5] ?></td>
            <td><?= $userHistory[6] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>