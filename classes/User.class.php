<?php
include_once("Db.class.php");

class User{

    private $m_sFirstName;
    private $m_sLastName;
    private $m_sEmail;
    private $m_sUserName;
    private $m_sPassword;
    private $m_iUserID;

    // s = string en v = vanalles en i = int

    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty){
            case "FirstName":
                if(!empty($p_vValue)){
                    $this->m_sFirstName = $p_vValue;
                }else{
                    throw new Exception("Gelieve alle velden in te vullen.");
                }
                break;
            case "LastName":
                if(!empty($p_vValue)){
                    $this->m_sLastName = $p_vValue;
                }else{
                    throw new Exception("Gelieve alle velden in te vullen.");
                }

                break;
            case "Email":
                if(!empty($p_vValue)){
                    $this->m_sEmail = $p_vValue;
                }else{
                    throw new Exception("Gelieve alle velden in te vullen.");
                }

                break;
            case "UserName":
                if(!empty($p_vValue)){
                    $this->m_sUserName= $p_vValue;
                }else{
                    throw new Exception("Gelieve alle velden in te vullen.");
                }

                break;
            case "Password":
                if(!empty($p_vValue)){
                    $this->m_sPassword = $p_vValue;
                }else{
                    throw new Exception("Gelieve alle velden in te vullen.");
                }

                break;
                
             case "UserID":
                if(!empty($p_vValue)){
                    $this->m_iUserID = $p_vValue;
                }else{
                    throw new Exception("Gelieve alle velden in te vullen.");
                }

                break;
        }
    }


    public function __get($p_sProperty)
    {
        switch($p_sProperty){
            case "FirstName":
                return $this->m_sFirstName;
                break;
            case "LastName":
                return $this->m_sLastName;
                break;
            case "Email":
                return $this->m_sEmail;
                break;
            case "UserName":
                return $this->m_sUserName;
                break;
            case "Password":
                return $this->m_sPassword;
                break;
             case "UserID":
                return $this->m_iUserID;
                break;
        }
    }

    public function Save(){

        $conn =  Db::getInstance();

        $statement = $conn->prepare("select * from tblUser where username = :username");

        $statement->bindValue(":username",$this->m_sUserName);
        $statement->execute();

        if($statement-> rowCount()>0)
        {

            throw new Exception("Username already exists");
        }
        else
        {

            $option = ['cost' => 12];
            $this->m_sPassword=password_hash($this->m_sPassword,PASSWORD_DEFAULT,$option);
            $statement = $conn->prepare("INSERT INTO tblUser
                            (
                            email,
                            firstname,
                            lastname,
                            username,
                            password
                            )
                            VALUES
                            (
                            :email,
                            :firstname,
                            :lastname,
                            :username,
                            :password
                            )
                            ");

            $statement->bindValue(":email",$this->m_sEmail);
            $statement->bindValue(":firstname",$this->m_sFirstName);
            $statement->bindValue(":lastname",$this->m_sLastName);
            $statement->bindValue(":username",$this->m_sUserName);
            $statement->bindValue(":password",$this->m_sPassword);
            $statement->execute();


        }


    }

    public function canLogin(){

                $conn =  Db::getInstance();
                $statement = $conn->prepare("select * from tblUser where username = :username");

                $statement->bindValue(":username",$this->m_sUserName);
                $statement->execute();
        

               if( $statement->rowCount() > 0){
                   $result = $statement->fetch(); // array van resultaten opvragen
                   $password = $this->m_sPassword;
                   $hash = $result['password'];
                   
                   if ( password_verify( $password, $hash) ){
                       $_SESSION['userID'] = $result['userID'];
                       return true;
            } else{
                    return false;
                       }

    }

    }

    public function changeSettings(){

        $conn =  Db::getInstance();
        $statement = $conn->prepare("UPDATE tblUser (email,username, firstname, lastname) VALUES (:email, :username, :firstname, :lastname) WHERE userID= :userID");

        $statement->bindValue(":username",$this->m_sUserName);
        $statement->bindValue(":email",$this->m_sEmail);
        $statement->bindValue(":firstname",$this->m_sFirstName);
        $statement->bindValue(":lastname",$this->m_sLastName);
        // $statement->bindValue(":password",$this->m_sPassword);

        if($statement->execute()){
            return true;
        }

    }

}
