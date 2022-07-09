<?php
session_start();
require('mysql/initdb.php');
require('controller/frontend.php');
ini_set('max_execution_time', 600);
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'login') {
            login();
        } elseif ($_GET['action'] == 'register') {
            register();
        } elseif ($_GET['action'] == 'request') {
            request();
        } elseif ($_GET['action'] == 'loadDB') {
            loadDB();
        } elseif (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {
            if ($_GET['action'] == 'logout') {
                logout();
            } elseif ($_GET['action'] == 'scooterList') {
                scooterList();
            } elseif ($_GET['action'] == 'myprofile') {
                myprofile();
            } elseif ($_GET['action'] == 'addScooter') {
                addScooter();
            } elseif ($_GET['action'] == 'endReload') {
                endReload();
            } elseif ($_GET['action'] == 'complain') {
                complain();
            } elseif ($_GET['action'] == 'acceptComplain') {
                acceptComplain();
            } elseif ($_GET['action'] == 'userList') {
                userList();
            } elseif ($_GET['action'] == 'upgradeUser') {
                upgradeUser();
            }else {
                welcome();
            }
        } else {
            welcome();
        }
    } else {
        welcome();
    }
} catch (Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
}
