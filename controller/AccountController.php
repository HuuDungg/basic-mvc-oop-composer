<?php
namespace App\Controller;

use App\Model\Account;
session_start();

class AccountController {
    public function home() {
        require_once "./view/home.php";
    }

    public function signIn() {
        $notice = "";
        require_once "./view/SignInForm.php";
    }

    public function processSignin() {
        
        // Code xử lý đăng nhập
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $account = new Account();
            $username = $_POST['username'];
            $password = $_POST['password'];
                if($account->signIn($username, $password)){
                    echo "Đăng nhập thành công " .$_POST['username'];
                } else {
                    $notice = "username or password invalid";
                    require_once "./view/SignInForm.php";
                }
            
        }
    }

    // Code xử lý đăng ký tài khoản
    public function signUp() {
        $noticeE = "";
        $noticeU = "";
        require_once "./view/SignUpForm.php";
    }
    public function processSignUp() {
        // Code xử lý đăng ký tài khoản
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $account = new Account();
            if($account->checkEmailExits($email)){
                $noticeE = "Email đã tồn tại";
                $noticeU = "";
                require_once "./view/SignUpForm.php";
                exit();
            }
            if($account->checkUserExits($username)){
                $noticeU = "Tên đăng nhập đã tồn tại";
                $noticeE = "";
                require_once "./view/SignUpForm.php";
                exit();
            }
            $codeVerify = $account->generateRandomNumber();
            $account->senMailNha($email, "http://localhost/trainmvc/?act=verification&code=".$codeVerify);
            $_SESSION["codeVerify"] = $codeVerify;
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $username;
            echo 'check your email to verify your account';
        }
    }

    public function verification() {
        $codeVerify = $_SESSION["codeVerify"];
        $email = $_SESSION["email"];
        $username = $_SESSION["username"];

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $code = $_GET['code'];
            if($code == $codeVerify){
                $account = new Account();
                $id = $account->signUp($username, $email);
                $_SESSION["id"] = $id;
                require_once "./view/UpdatePasswordForm.php";
            } else {
                echo 'Verification failed, please try again';
            }
        }
        
    }


    //update password

    public function updatePassword() {
        $id = $_SESSION["id"];
        $password = $_POST["password"];

        $account = new Account();
        if($account->updatePassword($id, $password) == true){
            session_unset();
            session_destroy();
            $notice = "";
            require_once "./view/SignInForm.php";
        }


              
    }



}
?>
