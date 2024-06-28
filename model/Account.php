<?php
namespace App\Model;

use Exception;
use mysqli;
use PHPMailer\PHPMailer\PHPMailer;

class Account{
    private $conn;
    public function __construct()
    {   
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDataWeb";
        $this->conn = new mysqli($server, $username, $password, $dbname);
    }
//processing sign in
    public function signIn($username, $password){
        return $this->authenticate($username, $password);
    }
    function authenticate($username, $password) {
         
        try {
            $stmt = $this->conn->prepare("SELECT * FROM account WHERE username =? AND password =?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
//processing sign up
    public function signUp($username, $email){
        try {
        $stmt = $this->conn->prepare("INSERT INTO `account` (`username`, `email`) VALUES (?, ?);");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        return $stmt->insert_id;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function senMailNha($email, $code){
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465; // or use 587 with TLS
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl'; // or use 'tls' for port 587
    
            // Gmail credentials
            $mail->Username = 'sharepage01@gmail.com';
            $mail->Password = 'wvif ezbq saqj dvgg';
    
            // Sender and recipient settings
            $mail->setFrom('sharepage01@gmail.com');
            $mail->addAddress($email);
    
            // Email content
            $mail->Subject = 'Verification code';
            $mail->Body    = "please click to verify your account  <a href='$code'>Click me</a>" ;
            $mail->isHTML(true);
    
            $mail->send();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    function generateRandomNumber() {
        $number = rand(0, 9999);
        return str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    //check email and username is correct
    function checkEmailExits($email){
        global $conn;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM account WHERE email =?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    function checkUserExits($username){
        global $conn;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM account WHERE username =?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //update password

    public function updatePassword($id, $password){
        try {
            $stmt = $this->conn->prepare("UPDATE account SET password =? WHERE id =?");
            $stmt->bind_param("si", $password, $id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    


}

?>