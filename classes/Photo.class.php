<?php
include_once("Db.class.php");

class Photo
{
    private  $m_sDescription;
    private  $m_sPhoto;
    private $m_iPostID;
    private $m_iUserID;
    private $m_dUploadTime;

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
            case "PostID":
                $this->m_iPostID = $p_vValue;
                break;
            case "UploadTime":
                $this->m_dUploadTime = $p_vValue;
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
            case "PostID":
                return $this->m_iPostID;
                break;
            case "UploadTime":
                return $this->m_dUploadTime;
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
                            userID,
                            uploadTime

                            )
                            VALUES
                            (
                            :description,
                            :photo,
                            :userID,
                            :uploadTime

                            )
                            ");

            $statement->bindValue(":description",$this->m_sDescription);
            $statement->bindValue(":photo",$this->m_sPhoto);
            $statement->bindValue(":userID",$this->m_iUserID);
            $statement->bindValue(":uploadTime",$this->m_dUploadTime);
            $statement->execute();


        }



    public function ShowProfilePhotos()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from tblPost where userID= :userID");
        $statement->bindValue(":userID", $this->m_iUserID);
        $statement->execute();
        if( $statement->rowCount() > 0){
            $result = $statement->fetchAll();
            return $result;

        }
            else{
                return "No photos found";
            }

    }

    public function  ShowPhotoDetails(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from tblPost where postID= :postID");
        $statement->bindValue(":postID", $this->m_iPostID);
        $statement->execute();
        if( $statement->rowCount() > 0){
            $result = $statement->fetch();
            return $result;

        }
        else{
            return "No photo found";
        }

    }

}