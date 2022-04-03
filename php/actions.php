<?php
session_start();
//header("Content-type: application/javascript; charset=utf-8");
require 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    if(count($_POST) == 5 && isset($_POST['name'])) {
        $new_user = new CreateUser();
        $new_user->setUserData1($_POST)->createFunc();
    } else if(count($_POST) == 2) {
        $login_user = new UserLogin();
        $login_user->setUserData($_POST)->loginFunc();
    } else if(count($_POST) == 5 && isset($_POST['new_name'])) {
        $upd_user = new UpdateUser();
        $upd_user->setUserData($_POST)->updateFunc();
    } else if(count($_POST) == 1 && isset($_POST['del'])) {
        $del_user = new DeleteUser();
        $del_user->setUserData($_POST)->deleteFunc();
    } else if(count($_POST) == 1 && isset($_POST['out'])) {
        $logout_user = new UserLogout();
        $logout_user->setUserData($_POST)->logoutFunc();
    } else {
        throw new Exception('Ошибка!');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

