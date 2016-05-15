<?php
include_once("Db.class.php");

class Photo
{
    private  $m_sDescription;
    private  $m_sPhoto;
    private $m_iUserID;

    public function __set($p_sProperty, $p_vValue){
        switch($p_sProperty) {
            case "Description":
                $this->m_sDescription = $p_vValue;
                break;
            case "Photo":
                $this->m_sPhoto = $p_vValue;
                break;
            case "UserID":
                    $this->m_iUserID = $p_vValue;
                break;
        }

    }

    public function __get($p_sProperty){
        switch($p_sProperty) {
            case "Description":
                return $this->m_sDescription;
                break;
            case "Photo":
                return $this->m_sPhoto;
                break;
            case "UserID":
                return $this->m_iUserID;
                break;
        }
    }
    public function SavePhoto()
    {


        $conn =  Db::getInstance();

        $statement = $conn->prepare("select * from tblPost where userID= :userID");
        $statement->bindValue(":userID",$this->m_iUserID);
        $statement->execute();



            $statement = $conn->prepare("INSERT INTO tblPost
                            (
                            description,
                            photo,
                            userID

                            )
                            VALUES
                            (
                            :description,
                            :photo,
                            :userID

                            )
                            ");

            $statement->bindValue(":description",$this->m_sDescription);
            $statement->bindValue(":photo",$this->m_sPhoto);
            $statement->bindValue(":userID",$this->m_iUserID);
            $statement->execute();


        }



   /* public function ShowPhoto()
    {
        $conn =  Db::getInstance();
    }*/

}