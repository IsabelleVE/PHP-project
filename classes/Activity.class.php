<?php


include_once("Db.class.php");

class Activity
{
    private $m_sText;


    private $m_sHost = "localhost";
    private $m_sUser = "root";
    private $m_sPassword = "";
    private $m_sDatabase = "php4wa";

    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty)
        {
            case "Text":
                $this->m_sText = $p_vValue;
                break;
        }
    }

    public function __get($p_sProperty)
    {
        $vResult = null;
        switch($p_sProperty)
        {
            case "Text":
                $vResult = $this->m_sText;
                break;
        }
        return $vResult;
    }

    public function Save()

    {
        $db = Db::getInstance();

        $table = "tblactivities";
        $cols = array("activity_description");
        $values = array($this->Text);
        $db->insert($table, $cols, $values);
    }

    public function GetRecentActivities()
    {
        $db = Db::getInstance();

        $cols = array("*");
        $table = "tblactivities";
        $limit = 5;
        $orderBy = "pk_activity_id";
        $orderHow = "DESC";

        $rResult = $db->select($cols, $table, $limit, $orderBy, $orderHow);
        return $rResult;
    }
}
?>