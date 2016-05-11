<?php
include("Db.class.php");

class Search
{
    private $m_sUserName;


    public function FindWords()
    {
        $conn =  Db::getInstance();
        $statement = $conn->prepare("select * from tblUser where username = :username");

        $statement->bindValue(":username",$this->m_sUserName);
        $statement->execute();
    }
}
