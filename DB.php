<?php
class DbSql {
    private $connection;
    private $Dbname='blood_bank';
    private $host='localhost';
    private $user='root';
    private $pass='';

    public function __construct()
    {
        try{
            $this->connection=new mysqli($this->host,$this->user,$this->pass,$this->Dbname);
        }catch(mysqli_sql_exception $e){
            echo $e->getMessage() ;
        }
    }
    public function get_connect(){
        return $this->connection;
    }
    public function insertInto($tableName,$names){
            return $this->connection->query("INSERT INTO $tableName SET $names");
    }
    public function get($tableName,$condtion=1){
        return $this->connection->query("SELECT * FROM $tableName WHERE $condtion");
    }
    public function delete($tableName,$condtion=1){
        return $this->connection->query("DELETE FROM $tableName WHERE $condtion");
    }
    public function update($tableName,$data,$condtion){
            return $this->connection->query("UPDATE $tableName SET $data   WHERE $condtion");
    }
    public function escapeString($string){
        return $this->connection->escape_string($string);
    }
    public function close(){
        return $this->connection->close();
    }
    public function __destruct()
    {
        $this->close();
    }
}
?>