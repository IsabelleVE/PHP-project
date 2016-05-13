<?php
include_once("Db.class.php");

class Photo
{
    private  $m_sDescription;


    public function SavePhoto()
    {


        $conn =  Db::getInstance();

        $statement = $conn->prepare("select * from tblPost where userID = '2'");


        $statement->execute();


            $statement = $conn->prepare("INSERT INTO tblPost
                            (
                            description,

                            )
                            VALUES
                            (
                            :description,

                            )
                            ");

            $statement->bindValue(":description",$this->m_sDescription);
           // $statement->bindValue(":photo",$this->m_sPhoto);
            $statement->execute();


        }



   /* public function ShowPhoto()
    {
        $conn =  Db::getInstance();
    }*/

}