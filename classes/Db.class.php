<?php
class Db {
    private static $conn;
    public static function getInstance(){
        if (is_null(self::$conn)){
            self::$conn = new PDO("mysql:host=localhost; dbname=instagram", "root", "root");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }


    // Voor de COMMENTS:
    //COMMENTS ONDERDEEL DB

    public function sanitize($val)
    {
        return $this->m_rConn->real_escape_string($val);
    }

    public function insert($table, $cols, $values)
    {
        $sql = "INSERT INTO $table (";
        $sql_cols = "";

        foreach($cols as $key=>$val)
        {
            if($sql_cols == "")
            {
                $sql_cols .= $val;
            }
            else
            {
                $sql_cols .= ", " . $val;
            }
        }
        $sql.= $sql_cols. ") VALUES (";

        $sql_values = "";
        foreach($values as $key=>$val)
        {
            $val = $this->sanitize($val);

            if($sql_values == "")
            {
                if(!is_int($val))
                    $sql_values .= "'";

                $sql_values .= $val;
            }
            else
            {
                $sql_values .= ", ";

                if(!is_int($val))
                    $sql_values .= "'";

                $sql_values .= $val;
            }


            if(!is_int($val))
                $sql_values .= "'";

        }

        $sql.="$sql_values);";
        $this->m_rConn->query($sql);
    }

    public function select($cols, $table, $limit, $orderby, $orderHow)
    {
        $sql = "SELECT ";
        $sql_from = "";


        foreach($cols as $key=>$val)
        {
            if($val == "*")
            {
                $sql_from = "*";
            }
            else
            {
                if($sql_from == "")
                {
                    $sql_from .= "(";
                    $sql_from .= $val;
                }
                else
                {
                    $sql_from .= ", " . $key;
                }
            }
        }

        if($sql_from != "*")
        {
            $sql_from .= ")";
        }


        $sql .= $sql_from;
        $sql .= " FROM $table";


        if(!empty($orderby))
        {
            $sql.= " ORDER BY $orderby";
        }


        if(!empty($orderHow))
        {
            $sql.= " $orderHow";
        }


        if(!empty($limit))
        {
            $sql.=" LIMIT $limit";
        }


        $result = $this->m_rConn->query($sql);
        $arrRecords = array();
        if($result)
        {
            while($row = $result->fetch_array())
            {
                $arrRecords[] = $row;
            }
        }

        return($arrRecords);

    }
}