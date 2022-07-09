<?php

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=troty;charset=utf8', 'root', '');
    return $db;
}

function create_DB()
{
    $link = new PDO('mysql:host=localhost;charset=utf8', 'root', '');
    if (!$link) {
        die("MySQL Connection error");
    }
    $query = file_get_contents("mysql/makedb.sql");

    $stmt = $link->prepare($query);

    $res = $stmt->execute();
    return $res;
}

function init_mechanic()
{
    $db = dbConnect();

    $xml = simplexml_load_file("resources/mecaniciens.xml") or die("Error: Cannot create object");

    foreach ($xml->mechanic as $mec) {
        $id = $mec->mechanicID->__toString();
        while (!$id[0]){
            $id = substr($id, 1);
        }
        $lastName = $mec->lastname;
        $firstName = $mec->firstname;
        $mdp = $mec->password;
        $phone = $mec->phone;
        $adCity = $mec->address->city;
        $adCP = $mec->address->cp;
        $adStreet = $mec->address->street;
        $adNumber = $mec->address->number;
        $hireDate = $mec->hireDate;
        $bankAccount = $mec->bankaccount;
        $req = $db->prepare('INSERT INTO Mechanic(id, lastName, firstName, mdp, phone, adCity, adCP, adStreet, adNumber, hireDate, bankAccount) 
                        VALUES(:id, :lastName, :firstName, :mdp, :phone, :adCity, :adCP, :adStreet, :adNumber, :hireDate, :bankAccount)');
        $res = $req->execute(array(
            'id' => $id,
            'lastName' => $lastName,
            'firstName' => $firstName,
            'mdp' => $mdp,
            'phone' => $phone,
            'adCity' => $adCity,
            'adCP' => $adCP,
            'adStreet' => $adStreet,
            'adNumber' => $adNumber,
            'hireDate' => $hireDate,
            'bankAccount' => $bankAccount
        ));
        if (!$res) {break;}
    }
    return $res;
}

function init_user()
{
    $db = dbConnect();

    $xml = simplexml_load_file("resources/anonyme_users.xml") or die("Error: Cannot create object");

    foreach ($xml->user as $person) {
        $id = $person->ID;
        $mdp = $person->password;
        $bankAccount = $person->bankaccount;
        $req = $db->prepare('INSERT INTO User(id, mdp, bankAccount) 
                        VALUES(:id, :mdp, :bankAccount)');
        $res = $req->execute(array(
            'id' => $id,
            'mdp' => $mdp,
            'bankAccount' => $bankAccount
        ));
        if (!$res) {break;}
    }
    return $res;
}

function init_registered_user()
{
    $db = dbConnect();

    $xml = simplexml_load_file("resources/registeredUsers.xml") or die("Error: Cannot create object");

    foreach ($xml->user as $person) {
        $id = $person->ID;
        $lastName = $person->lastname;
        $firstName = $person->firstname;
        $mdp = $person->password;
        $phone = $person->phone;
        $adCity = $person->address->city;
        $adCP = $person->address->cp;
        $adStreet = $person->address->street;
        $adNumber = $person->address->number;
        $bankAccount = $person->bankaccount;
        $req = $db->prepare('INSERT INTO User(id, mdp, bankAccount) 
                            VALUES(:id, :mdp, :bankAccount)');
        $res = $req->execute(array(
            'id' => $id,
            'mdp' => $mdp,
            'bankAccount' => $bankAccount
        ));
        if (!$res){break;}
        $req = $db->prepare('INSERT INTO UserRecharge(id, lastName, firstName, phone, adCity, adCP, adStreet, adNumber) 
                        VALUES(:id, :lastName, :firstName, :phone, :adCity, :adCP, :adStreet, :adNumber)');
        $res = $req->execute(array(
            'id' => $id,
            'lastName' => $lastName,
            'firstName' => $firstName,
            'phone' => $phone,
            'adCity' => $adCity,
            'adCP' => $adCP,
            'adStreet' => $adStreet,
            'adNumber' => $adNumber
        ));
        if (!$res) {break;}
    }
    return $res;
}

function init_scooter_reload_trip_reparation()
{
    $db = dbConnect();
    $query = file_get_contents("mysql/initdb.sql");
    $stmt = $db->prepare($query);
    $res = $stmt->execute();
    // print_r($req->errorInfo());
    return $res;
}

function loadDB()
{
    try {
        ini_set('max_execution_time', 600);
        $tryInitDB = 0;
        if (!(create_DB() && init_mechanic() && init_user() && init_registered_user() && init_scooter_reload_trip_reparation())) {
            $tryInitDB = 1;
        }
        require('view/welcome.php');
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        $db = dbConnect();
        $db->query("DROP DATABASE troty");
        require('view/welcome.php');
    }
}
