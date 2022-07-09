<?php

function get_scooters()
{
    $db = dbconnect();
    $req = $db->query('SELECT id, model, complain, reloadLevel, DATE_FORMAT(dateCommissioning, \'%d/%m/%Y à %hh%im%ss\'), positionx, positiony FROM scooter WHERE available=1');
    // print_r($req->errorInfo());
    return $req;
}

function get_scooter_history()
{
    $db = dbconnect();
    $req = $db->query('SELECT scooter, date, user,... FROM trips WHERE scooter');
    return $req;
}

function get_user($username, $password)
{
    $db = dbConnect();
    $req = $db->prepare("SELECT id, bankAccount FROM User WHERE id ='$username' and mdp= '$password'");
    $req->execute();
    $data = $req->fetch();
    return $data;
}

function get_userRecharge($username, $password)
{
    $db = dbConnect();
    $req = $db->prepare("SELECT firstName, lastName, phone, adCity, adCP, adStreet, adNumber FROM UserRecharge WHERE id ='$username'");
    $req->execute();
    $data = $req->fetch();
    return $data;
}

function add_user($username, $password, $bankAccount)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO user(id, mdp, bankAccount) VALUES(?, ?, ?)');
    $res = $req->execute(array($username, $password, $bankAccount));
    // print_r($req->errorInfo());
    return $res;
}

function upgrade_user($username, $firstName, $lastName, $phone, $street, $number, $cp, $city)
{
    // echo $username, $firstName, $lastName, $phone, $street, $cp, $city;
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO userRecharge(id, firstName, lastName, phone, adstreet, adnumber, adcp, adcity) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
    $res = $req->execute(array($username, $firstName, $lastName, $phone, $street, $number, $cp, $city));
    // print_r($req->errorInfo());
    return $res;
}

function update_username($username)
{
    $db = dbConnect();
    $req = $db->prepare("UPDATE user set id='$username' WHERE id='$username'");
    $res = $req->execute();
    return $res;
}

function get_user_history($username)
{
    // TODO: temps de la course DATEDIFF()
    $db = dbConnect();
    $res = $db->query("SELECT DATE_FORMAT(starttime, '%d/%m/%Y à %hh%im%ss'), DATE_FORMAT(endtime, '%d/%m/%Y à %hh%im%ss'), sourcex, sourcey, destinationx, destinationy, distance FROM trip WHERE user='$username' ORDER BY starttime DESC");
    // echo $data[0];
    // $res = $req->execute();

    // print_r($res->errorInfo());

    return $res;
}

function add_complain($username, $scooterID)
{
    // echo $username, $scooterID;
    $db = dbConnect();
    $req = $db->prepare("UPDATE scooter set complain=1 WHERE id='$scooterID'");
    $res = $req->execute();
    $req = $db->prepare("INSERT INTO reparation(scooter, user, datecomplain) VALUES(?, ?, NOW())");
    $res2 = $req->execute(array($scooterID, $username));
    $res = $res || $res2;
    return $res;
}

function get_mechanic($username, $password)
{
    $db = dbConnect();
    $req = $db->prepare("SELECT id, firstname, lastname, phone, adcity, adcp, adstreet, adnumber, bankaccount, DATE_FORMAT(hiredate, '%d/%m/%Y à %hh%im%ss') FROM mechanic WHERE id ='$username' and mdp= '$password'");
    $req->execute();
    $data = $req->fetch();
    return $data;
}

function begin_trip($username, $scooterID)
{
    // TODO localisation de depart
    echo $username, $scooterID;
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO trip(user, scooter, starttime) VALUES(?, ?, NOW())');
    $res = $req->execute(array($username, $scooterID));
    print_r($req->errorInfo());
    return $res;
}

function begin_reload($username, $scooterID, $initLoad, $positionX, $positionY)
{
    // echo $username, $scooterID, $initLoad;
    $db = dbConnect();
    $req = $db->query("SELECT available FROM scooter WHERE id='$scooterID'");
    $data = $req->fetch();
    if ($data[0]) {
        $req = $db->prepare('INSERT INTO reload(user, scooter, initialLoad, sourceX, sourceY, startTime) VALUES(?, ?, ?, ?, ?, NOW())');
        $res = $req->execute(array($username, $scooterID, $initLoad, $positionX, $positionY));
        $req = $db->query("UPDATE scooter SET available=0 WHERE id='$scooterID'");
    } else {
        $res = 0;
    }
    // print_r($req->errorInfo());
    return $res;
}

function add_scooter($model, $reloardLevel, $positionX, $positionY)
{
    // echo $username, $scooterID, $initLoad;
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO scooter(model, reloadLevel, positionX, positionY, dateCommissioning) VALUES(?, ?, ?, ?, NOW())');
    $res = $req->execute(array($model, $reloardLevel, $positionX, $positionY));
    // print_r($req->errorInfo());
    return $res;
}

function get_scooters_recharge($username)
{
    // echo $username;
    $db = dbConnect();
    $req = $db->prepare("SELECT id, scooter, initialLoad, sourcex, sourcey, DATE_FORMAT(startTime, '%d/%m/%Y à %hh%im%ss') FROM reload WHERE user='$username' and endtime IS NULL");
    $req->execute();
    // print_r($req->errorInfo());
    return $req;
}

function end_reload($reloadID, $endCharge, $positionX, $positionY, $scooterID)
{
    $db = dbConnect();
    $req = $db->prepare("UPDATE reload SET finalLoad='$endCharge', destinationx='$positionX', destinationY='$positionY', endTime=NOW() WHERE id='$reloadID'");
    $res = $req->execute();
    // print_r($req->errorInfo());

    $req = $db->prepare("UPDATE scooter SET available=1, positionX='$positionX', positionY='$positionY' WHERE id='$scooterID'");
    $res = $req->execute();

    // print_r($req->errorInfo());
    return $res;
}

function delete_scooter($scooterID)
{
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM scooter WHERE id='$scooterID'");
    $res = $req->execute();
    // print_r($req->errorInfo());
    return $res;
}

function get_complain()
{
    $db = dbConnect();
    $req = $db->query("SELECT id, scooter, user, DATE_FORMAT(dateComplain, '%d/%m/%Y à %hh%im%ss')  FROM reparation WHERE mechanic IS NULL");
    return $req;
}

function end_complain($username, $complainID, $note)
{
    $db = dbConnect();
    $req = $db->prepare("UPDATE reparation SET mechanic='$username', note='\'$note\'', dateReparation=NOW() WHERE id='$complainID'");
    $res = $req->execute();
    // print_r($req->errorInfo());
    return $res;
}

function get_scooters_reload()
{
    $db = dbconnect();
    $req = $db->query('SELECT id, model, complain, reloadLevel, DATE_FORMAT(dateCommissioning, \'%d/%m/%Y à %hh%im%ss\'), positionx, positiony, available FROM scooter');
    // print_r($req->errorInfo());
    return $req;
}

function update_scooter_status($scooterID, $arg)
{
    if ($arg) {
        $db = dbConnect();
        $req = $db->prepare("UPDATE scooter SET available=0  WHERE id='$scooterID'");
        $res = $req->execute();
        // print_r($req->errorInfo());
    } else {
        $db = dbConnect();
        $req = $db->prepare("UPDATE scooter SET available=1  WHERE id='$scooterID'");
        $res = $req->execute();
        // print_r($req->errorInfo());
    }
    return $res;
}

function get_users()
{
    $db = dbConnect();
    $req = $db->prepare("SELECT id, bankAccount FROM user WHERE id NOT IN(SELECT id FROM userRecharge) ");
    $req->execute();
    return $req;
}
function request1()
{
    $db = dbConnect();
    $req = $db->prepare("SELECT id, positionX, positionY FROM scooter where available=1");
    $res = $req->execute();
    return $req;
}
function request2()
{
    $db = dbConnect();
    $req = $db->prepare("SELECT distinct user
    FROM Reload
    where Reload.user not in (SELECT m.user 
                              FROM(SELECT distinct *
                                   FROM (SELECT user, scooter
                                         FROM Reload) r 
                                   where not exists (SELECT distinct r.user, r.scooter
                                                     FROM (SELECT distinct Trip.user, Trip.scooter
                                                           FROM Trip)t 
                                                     where r.scooter = t.scooter and r.user = t.user) ) m)");
    $res = $req->execute();
    return $req;
}
function request3()
{
    $db = dbConnect();
    $req = $db->prepare("SELECT scooter, sum(distance)
    FROM Trip
    group by scooter
    having sum(distance) = (SELECT max(tb.s)
                            FROM (SELECT sum(distance) s 
                                  FROM Trip
                                  group by scooter) tb
                                  )");
    $req->execute();
    // print_r($req->errorInfo());
    return $req;
}
function request4()
{ 
    $db = dbConnect();
    $req = $db->prepare("SELECT scooter, count(id)
    FROM Reparation
    group by scooter
    having count(id) >= 10");
    $req->execute();
    // print_r($req->errorInfo());
    return $req;
}
function request5()
{ 
    $db = dbConnect();
    $req = $db->prepare("SELECT id, positionX, positionY FROM scooter where available = True");
    $res = $req->execute();
    return $res;
}
