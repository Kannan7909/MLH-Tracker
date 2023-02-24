<?php

class admin extends databaseConnection{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password){
        $sql = "SELECT * FROM user WHERE userName='$username' AND password='$password'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function addRegion($regions){
        foreach($regions as $region){
            $region_uId = strtolower($region); // convert to lowercase
            $region_uId = str_replace(" ", "", $region_uId); // replace spaces as '-'
            $region = mysqli_real_escape_string($this->conn, $region);
            $sql = "INSERT INTO regions (region, uId) VALUES ('$region', '$region_uId')";
            $result = mysqli_query($this->conn, $sql);
        }
        return $result;
    }

    public function addLender($regionId, $lenders){
        foreach($lenders as $lender){
            $lender_uId = preg_replace('/[^.a-zA-Z0-9\s]/', ' ', $lender); // Remove all special characters
            $lender_uId = preg_replace('/\s+/', ' ', $lender_uId); // Replace multiple spaces with a single space
            $lender_uId = rtrim($lender_uId); //Remove word last space 
            $lender_uId = ltrim($lender_uId); //Remove word first space 
            $lender_uId = strtolower($lender_uId); // convert to lowercase
            $lender_uId = str_replace(" ", "-", $lender_uId); // replace spaces as '-'
            $lender = mysqli_real_escape_string($this->conn, $lender);
            $sql = "INSERT INTO lenders (regionId,lender,uId) VALUES ('$regionId', '$lender','$lender_uId')";
            $result = mysqli_query($this->conn, $sql);
        }        
        return $result;
    }

    public function getRegisteredUser(){
        $sql = "SET SESSION group_concat_max_len = 1000000";
        $result = mysqli_query($this->conn, $sql);
        $sql = "SELECT customers.customerId, firstName, lastName, email, phone, address, company, emailValidation, status, date, GROUP_CONCAT(DISTINCT regions.region ORDER BY regions.regionId ASC) as regions, GROUP_CONCAT(lenders.lender ORDER BY lenders.lenderId ASC) as lenders
        FROM customers
        LEFT OUTER JOIN lender_child ON lender_child.customerId = customers.customerId
        LEFT OUTER JOIN regions ON lender_child.regionId = regions.regionId
        LEFT OUTER JOIN lenders ON lender_child.lenderId = lenders.lenderId GROUP BY customers.customerId ORDER BY lenders ASC";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);  
        return $row;
    }

    public function getRegion(){
        $sql = "SELECT * FROM regions";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);  
        return $row;
    }

    public function checkPassword($userId, $oldPassword){
        $sql = "SELECT * FROM user WHERE userId='$userId' AND password='$oldPassword'";
        $result = mysqli_query($this->conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount==1){
            return true;
        }
        return false;
    }

    public function changePassword($newPassword,$userId){
        $sql = "UPDATE user set password='$newPassword' WHERE userId='$userId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function addEmailConfig($hostName, $userName, $password, $fromAddress){
        $sql = "INSERT INTO emailConfig (host,userName, password, fromAddress) VALUES ('$hostName', '$userName','$password','$fromAddress')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function updateEmailConfig($id,$hostName, $userName, $password, $fromAddress){
        $sql = "UPDATE emailConfig SET host='$hostName', userName='$userName', password='$password', fromAddress='$fromAddress' WHERE Id='$id'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function getEmailConfig(){
        $sql = "SELECT * FROM emailConfig";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);  
        return $row;
    }

    public function addUser($fName, $lName, $userName, $password, $phone, $email){
        $fName = mysqli_real_escape_string($this->conn, $fName);
        $lName = mysqli_real_escape_string($this->conn, $lName);
        $sql = "INSERT INTO `user` (`firstName`, `lastName`, `userName`, `password`, `phone`, `email`) 
                VALUES ('$fName', '$lName', '$userName', '$password', '$phone', '$email')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function getUsers(){
        $sql = "SELECT * FROM user";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);  
        return $row;
    }

    public function activateUser($userId){
        $sql = "UPDATE user SET status=1 WHERE userId='$userId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function deactivateUser($userId){
        $sql = "UPDATE user SET status=0 WHERE userId='$userId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function deleteUser($userId){
        $sql = "DELETE FROM user WHERE userId='$userId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function activateCustomer($customerId){
        $sql = "UPDATE customers SET status=1 WHERE customerId='$customerId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function deactivateCustomer($customerId){
        $sql = "UPDATE customers SET status=0 WHERE customerId='$customerId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function deleteCustomer($customerId){
        $sql = "DELETE FROM customers WHERE customerId='$customerId'";
        $result = mysqli_query($this->conn, $sql);

        $sql = "DELETE FROM lender_child WHERE customerId='$customerId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function getUser($userId){
        $sql = "SET SESSION group_concat_max_len = 1000000";
        $result = mysqli_query($this->conn, $sql);
        $sql = "SELECT customers.customerId, firstName, lastName, email, phone, address, company, emailValidation, status, date, GROUP_CONCAT(DISTINCT regions.region ORDER BY regions.regionId ASC) as regions, GROUP_CONCAT(lenders.lender ORDER BY lenders.lenderId ASC) as lenders
        FROM customers
        LEFT OUTER JOIN lender_child ON lender_child.customerId = customers.customerId
        LEFT OUTER JOIN regions ON lender_child.regionId = regions.regionId
        LEFT OUTER JOIN lenders ON lender_child.lenderId = lenders.lenderId WHERE customers.customerId = '$userId' GROUP BY customers.customerId ORDER BY lenders ASC";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);  
        return $row;      
    }
}

?>