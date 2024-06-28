<?php
//show error message
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "vendor/autoload.php";
use App\Controller\AccountController;

$act = $_GET["act"] ?? "/";
$accountController = new AccountController();

match($act) {
    "/" => $accountController->home(),
    "signIn" => $accountController->signIn(),
    "signUp" => $accountController->signUp(),
    "processSignUp" => $accountController->processSignUp(),
    "processSignin" => $accountController->processSignin(),
    "verification" => $accountController->verification(),
    "updatePassword" => $accountController->updatePassword()
    
};
