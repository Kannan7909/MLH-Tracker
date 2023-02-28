<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class user extends DatabaseConnection{   
    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        parent::__construct();
    }
    
    public function login($userName, $password){
        $sql = "SELECT * FROM customers WHERE email='$userName' AND password='$password'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function checkUserExist($email){
        $sql = "SELECT * FROM customers WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>=1){
            return true;
        }
        else{
            return false;
        }
    }

    function register($firstName, $lastName, $email, $phone, $address, $company, $region, $lender, $password, $otp){
        $address = mysqli_real_escape_string($this->conn, $address);
        $sql = "INSERT INTO customers (firstName, lastName, email, phone, address, company, region,lender, password, otp)
                VALUES
                ('$firstName','$lastName','$email','$phone','$address','$company','$region','$lender', '$password', '$otp')";
        $result = mysqli_query($this->conn, $sql);
        $insertedId = mysqli_insert_id($this->conn);
        return $insertedId;
    }

    public function customerLenderAdd($customerId, $lenders){
        foreach($lenders as $lender){
            $lenderParts = explode('-', $lender);
            $lenderId = $lenderParts[0];
            $regionId = $lenderParts[1];
            $sql = "INSERT INTO lender_child (customerId, lenderId, regionId)
                VALUES
                ('$customerId','$lenderId','$regionId')";
            $result = mysqli_query($this->conn, $sql);
        }
        return 1;
    }

    function contact($firstName,$lastName,$email,$phone,$message){
        $sql = "INSERT INTO contact (firstName, lastName, email, phone, message)
                VALUES
                ('$firstName','$lastName','$email','$phone','$message')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    
    public function getRegion(){
        $sql = "SELECT * FROM regions";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);  
        return $row;
    }

    public function getLender($regionId){
        $sql = "SELECT * FROM lenders 
        WHERE `regionId` IN (SELECT `regionId` FROM lenders  GROUP BY `regionId` HAVING COUNT(`regionId`) > 2)
        AND regionId IN ($regionId);";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);  
        return $row;
    }

    public function sendMail($subject, $emailId, $content){
        try {
            //Server settings
            $this->mail->SMTPDebug = 0;                      //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = 'mail.mlhtracker.com';                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = 'admin@mlhtracker.com';                     //SMTP username
            $this->mail->Password   = 'WR}8Cg#P}ijz';                               //SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $this->mail->setFrom('admin@mlhtracker.com', 'MLH Tracker');
            $this->mail->addAddress($emailId);              
        
            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $content;
        
            if($this->mail->send()){
                return true;
            }
            
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function getUser($customerId){
        $sql = "SET SESSION group_concat_max_len = 1000000";
        $result = mysqli_query($this->conn, $sql);
        $sql = "SELECT customers.customerId, firstName, lastName, email, phone, address, company, emailValidation, status, date, GROUP_CONCAT(DISTINCT regions.region ORDER BY regions.regionId ASC) as regions, GROUP_CONCAT(lenders.lender ORDER BY lenders.lenderId ASC) as lenders
        FROM customers
        LEFT OUTER JOIN lender_child ON lender_child.customerId = customers.customerId
        LEFT OUTER JOIN regions ON lender_child.regionId = regions.regionId
        LEFT OUTER JOIN lenders ON lender_child.lenderId = lenders.lenderId where customers.customerId='$customerId'";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        return $row;
    }

    public function validateEmailId($email, $otp){
        $sql = "SELECT * FROM customers where email = '$email' and otp='$otp'";
        $result = mysqli_query($this->conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount==1){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateStatus($email){
        $sql = "UPDATE customers set emailValidation=1 where email='$email'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function checkPassword($userId,$oldPassword){
        $sql = "SELECT * FROM customers WHERE customerId='$userId' AND password='$oldPassword'";
        $result = mysqli_query($this->conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount==1){
            return true;
        }
        return false;
    }

    public function changePassword($newPassword,$userId){
        $sql = "UPDATE customers set password='$newPassword' WHERE customerId='$userId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function updateOtp($email, $otp){
        $sql = "UPDATE customers set otp='$otp' WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function otpVerification($email, $otp){
        $sql = "SELECT * FROM customers WHERE email='$email' AND otp='$otp'";
        $result = mysqli_query($this->conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount==1){
            return true;
        }
        return false;
    }

    public function addNewPassword($email, $password){
        $sql = "UPDATE customers set password='$password' WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}

?>