<?php
require('model/frontend.php');

function welcome()
{
    require('view/welcome.php');
}

function login()
{
    // TODO: gerer le 0 
    $tryConnect = 0;
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        if ($user = get_user($_POST['username'], $_POST['password'])) {
            if ($userRecharge = get_userRecharge($_POST['username'], $_POST['password'])) {
                $_SESSION['userType'] = "recharge";
                $_SESSION['username'] = $user[0];
                $_SESSION['bankAccount'] = $user[1];
                $_SESSION['firstName'] = $userRecharge[0];
                $_SESSION['lastName'] = $userRecharge[1];
                $_SESSION['phone'] = $userRecharge[2];
                $_SESSION['adCity'] = $userRecharge[3];
                $_SESSION['adCP'] = $userRecharge[4];
                $_SESSION['adStreet'] = $userRecharge[5];
                $_SESSION['adNumber'] = $userRecharge[6];
            } else {
                $_SESSION['userType'] = "anonyme";
                $_SESSION['username'] = $user[0];
                $_SESSION['bankAccount'] = $user[1];
            }
            myprofile();
        } elseif ($mechanic = get_mechanic($_POST['username'], $_POST['password'])) {
            $_SESSION['userType'] = "mechanic";
            $_SESSION['username'] = $mechanic[0];
            $_SESSION['firstName'] = $mechanic[1];
            $_SESSION['lastName'] = $mechanic[2];
            $_SESSION['phone'] = $mechanic[3];
            $_SESSION['adCity'] = $mechanic[4];
            $_SESSION['adCP'] = $mechanic[5];
            $_SESSION['adStreet'] = $mechanic[6];
            $_SESSION['adNumber'] = $mechanic[7];
            $_SESSION['bankAccount'] = $mechanic[8];
            $_SESSION['hireDate'] = $mechanic[9];
            myprofile();
        } else {
            $tryConnect = 1;
            require('view/login.php');
        }
    } else {
        require('view/login.php');
    }
}

function logout()
{
    session_unset();
    session_destroy();
    session_write_close();
    require('view/welcome.php');
}

function register()
{
    if (isset($_GET['registerType']) && !empty($_GET['registerType'])) {
        $userType = $_GET['registerType'];
    } else {
        $userType = "anonyme";
    }
    if (
        isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['firstName']) && !empty($_POST['firstName'])
        && isset($_POST['lastName']) && !empty($_POST['lastName'])
        && isset($_POST['phone']) && !empty($_POST['phone'])
        && isset($_POST['street']) && !empty($_POST['street'])
        && isset($_POST['number']) && !empty($_POST['number'])
        && isset($_POST['cp']) && !empty($_POST['cp'])
        && isset($_POST['city']) && !empty($_POST['city'])
        && isset($_POST['bankAccount']) && !empty($_POST['bankAccount'])
    ) {
        $tryRegister = 0;
        if (add_user($_POST['username'], $_POST['password'], $_POST['bankAccount']) && upgrade_user($_POST['username'], $_POST['firstName'], $_POST['lastName'], $_POST['phone'], $_POST['street'], $_POST['number'], $_POST['cp'], $_POST['city'])) {
            require('view/register.php');
        } else {
            $tryRegister = 1;
            require('view/register.php');
        }
    } elseif (
        isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['bankAccount']) && !empty($_POST['bankAccount'])
    ) {
        $tryRegister = 0;
        if (add_user($_POST['username'], $_POST['password'], $_POST['bankAccount'])) {
            require('view/register.php');
        } else {
            $tryRegister = 1;
            require('view/register.php');
        }
    } else {
        require('view/register.php');
    }
}

function scooterList()
{
    // TODO: commencer un trip et le finir

    if (isset($_GET['button']) && !empty($_GET['button'])) {
        if ($_GET['button'] == "reserve") {
            $tryReserve = 0;
            begin_trip();
        } elseif ($_GET['button'] == "recharge") {
            $tryRecharge = 0;;
            if (!begin_reload($_SESSION['username'], $_GET['scooterID'], $_GET['initLoad'], $_GET['positionX'], $_GET['positionY'])) {
                $tryRecharge = 1;
            }
        } elseif ($_GET['button'] == "complain") {
            $tryComplain = 0;
            if (!add_complain($_SESSION['username'], $_GET['scooterID'])) {
                $tryComplain = 1;
            }
        } elseif ($_GET['button'] == "delete") {
            $tryDelete = 0;
            if (!delete_scooter($_GET['scooterID'])) {
                $tryDelete = 1;
            }
        } elseif ($_GET['button'] == 'available') {
            $tryStatus = 0;
            if (!update_scooter_status($_GET['scooterID'], 1)) {
                $tryStatus = 1;
            }
        } elseif ($_GET['button'] == 'unavailable') {
            $tryStatus = 0;
            if (!update_scooter_status($_GET['scooterID'], 0)) {
                $tryStatus = 1;
            }
        }
    }
    if ($_SESSION['userType'] == 'recharge') {
        $scootersRecharge = get_scooters_recharge($_SESSION['username']);
    } else {
        $scootersRecharge = 0;
    }
    if ($_SESSION['userType'] == 'mechanic') {
        $scooters = get_scooters_reload();
    } else {
        $scooters = get_scooters();
    }
    require('view/scooterList.php');
}

function myprofile()
{
    $userHistorys = get_user_history($_SESSION['username']);
    // $userHistory = $userHistorys->fetch();
    // echo $userHistory[0], $userHistory[1], $userHistory[2], $userHistory[3], $userHistory[4], $userHistory[5], $userHistory[6];
    if (isset($_GET['toEdit']) && !empty($_GET['toEdit'])) {
        $toEdit = $_GET['toEdit'];
    } else {
        $toEdit = "not";
    }
    if (
        isset($_POST['firstName']) && !empty($_POST['firstName'])
        && isset($_POST['lastName']) && !empty($_POST['lastName'])
        && isset($_POST['phone']) && !empty($_POST['phone'])
        && isset($_POST['street']) && !empty($_POST['street'])
        && isset($_POST['number']) && !empty($_POST['number'])
        && isset($_POST['cp']) && !empty($_POST['cp'])
        && isset($_POST['city']) && !empty($_POST['city'])
    ) {
        $tryRegister = 0;
        if (upgrade_user($_SESSION['username'], $_POST['firstName'], $_POST['lastName'], $_POST['phone'], $_POST['street'], $_POST['number'], $_POST['cp'], $_POST['city'])) {
            $_SESSION['userType'] = "recharge";
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['adCity'] = $_POST['city'];
            $_SESSION['adCP'] = $_POST['cp'];
            $_SESSION['adStreet'] = $_POST['street'];
            $_SESSION['adNumber'] = $_POST['number'];
            require('view/myprofile.php');
        } else {
            $tryRegister = 1;
            require('view/myprofile.php');
        }
    } elseif (isset($_GET['update']) && !empty($_GET['update'])) {
        if ($_GET['update'] == "username") {
            update_username($_POST['update_username']);
        }
    } else {
        require('view/myprofile.php');
    }
}

function addScooter()
{
    if (
        isset($_POST['model']) && !empty($_POST['model'])
        && isset($_POST['reloadLevel']) && !empty($_POST['reloadLevel'])
        && isset($_POST['positionX']) && !empty($_POST['positionX'])
        && isset($_POST['positionY']) && !empty($_POST['positionY'])
    ) {
        // echo $_POST['model'], $_POST['reloadLevel'],$_POST['complain'];
        $tryAdd = 0;
        if (!add_scooter($_POST['model'], $_POST['reloadLevel'], $_POST['positionX'], $_POST['positionX'])) {
            $tryAdd = 1;
        }
        require('view/addScooter.php');
    } else {
        require('view/addScooter.php');
    }
}

function endReload()
{
    if (
        isset($_POST['finalLoad']) && !empty($_POST['finalLoad'])
        && isset($_POST['positionX']) && !empty($_POST['positionX'])
        && isset($_POST['positionY']) && !empty($_POST['positionY'])
    ) {
        // echo $_POST['model'], $_POST['reloadLevel'],$_POST['complain'];
        $tryEnd = 0;
        if (!end_reload($_GET['reloadID'], $_POST['finalLoad'], $_POST['positionX'], $_POST['positionY'], $_GET['scooterID'])) {
            $tryEnd = 1;
            require('view/endReload.php');
        } else {
            require('view/endReload.php');
        }
    } else {
        require('view/endReload.php');
    }
}

function complain()
{
    $complains = get_complain();
    require('view/complain.php');
}

function acceptComplain()
{
    // echo $_GET['complainID'], $_POST['note'];
    if (isset($_GET['button']) && !empty($_GET['button'])) {
        $tryAcc = 0;
        if (!end_complain($_SESSION['username'], $_GET['complainID'], $_POST['note'])) {
            $tryAcc = 1;
        }
    }
    require('view/acceptComplain.php');
}

function userList()
{
    $users = get_users();
    require('view/userList.php');
}

function upgradeUser()
{
    if (
        isset($_POST['firstName']) && !empty($_POST['firstName'])
        && isset($_POST['lastName']) && !empty($_POST['lastName'])
        && isset($_POST['phone']) && !empty($_POST['phone'])
        && isset($_POST['street']) && !empty($_POST['street'])
        && isset($_POST['number']) && !empty($_POST['number'])
        && isset($_POST['cp']) && !empty($_POST['cp'])
        && isset($_POST['city']) && !empty($_POST['city'])
    ) {
        $tryAcc = 0;

        if (!upgrade_user($_GET['userID'], $_POST['firstName'], $_POST['lastName'], $_POST['phone'], $_POST['street'], $_POST['number'], $_POST['cp'], $_POST['city'])) {
            $tryAcc = 1;
        }
    }
    require('view/upgradeUser2.php');
}

function request()
{
    switch ($_GET['number']) {
        case '1':
            $infos = request1();
            break;
        case '2':
            $infos = request2();
            break;
        case '3':
            $infos = request3();
            break;
        case '4':
            $infos = request4();
            break;
        case '5':
            $infos = request5();
            break;
    }
    require('view/request.php');
}
