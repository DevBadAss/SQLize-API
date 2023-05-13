<?php

class SQLize {
    private $db;
    
    public function __construct($db_file)
    {
        $this->db = new SQLite3($db_file);
    }

    public function createTable($tableName, $columns)
    {
        $query = "CREATE TABLE $tableName ($columns)";
        if($this->db->exec($query)){
            return true;
        }else{
            return false;
        }
    }

    public function deleteTable($tableName)
    {
        $query = "DROP TABLE IF EXISTS $tableName";
        if($this->db->exec($query)){
            return true;
        }else{
            return false;
        }
    }

    public function deleteData($tableName, $condition)
    {
        if($condition == "" || $condition == null){
            $query = "DELETE FROM  $tableName";
            if($this->db->exec($query)){
                return true;
            }else{
                return false;
            }
        }else{
            $query = "DELETE FROM  $tableName WHERE $condition";
            if($this->db->exec($query)){
                return true;
            }else{
                return false;
            }
        }
    }

    public function queryTable($tableName)
    {
        $query = "SELECT * FROM $tableName";
        $result = $this->db->query($query);    
        $data = array();
        while($row = $result->fetchArray(SQLITE3_NUM)){
            $data[] = $row;
        }
        return $data;
    }

    public function queryColumn($tableName, $columns, $condition)
    {
        if($condition == "" || $condition == null){
            $query = "SELECT $columns FROM $tableName";
            $result = $this->db->query($query);
            $data = array();
            while($row = $result->fetchArray(SQLITE3_NUM)){
                $data[] = $row;
            }
            return $data;
        }else{
            $query = "SELECT $columns FROM $tableName WHERE $condition";
            $result = $this->db->query($query);
            $data = array();
            while($row = $result->fetchArray(SQLITE3_NUM)){
                $data[] = $row;
            }
            return $data;
        }

    }

    public function insertData($tableName, $data)
    {
        $json = json_decode($data, true);
        $keys = implode(',', array_keys($json));
        $values = "'".implode("','", array_values($json))."'";
        $query = "INSERT INTO $tableName ($keys) VALUES ($values)";

        if($this->db->exec($query)){
            return true;
        }else{
            return false;
        }
    }

    
    public function alterTable($tableName, $action, $columnName, $datatype)
    {
        $query = "ALTER TABLE $tableName $action COLUMN $columnName $datatype";

        if($this->db->exec($query)){
            return true;
        }else{
            return false;
        }
    }
    
    public function updateTable($tableName, $setValues, $condition)
    {
        $set = "";
        foreach($setValues as $key => $value){
            $set.="$key='$value',";
        }
        $set = rtrim($set, ',');
        $query = "Update $tableName SET $set WHERE $condition";

        if($this->db->exec($query)){
            return true;
        }else{
            return false;
        }
    }

    public function getListTable()
    {
        $query = "SELECT  name FROM sqlite_master WHERE type='table'";
        $result = $this->db->query($query);
        $tables = array();
        while($row = $result->fetchArray(SQLITE3_NUM)){
            $tables[] = $row[0];
        }
        return $tables;
    }


}

?>