<?php
namespace model;

abstract class Model
{
    protected $connect;
    public $tableName;

    public function __construct()
    {
        $this->connect = new PDO('mysql:host='.HOST.';'.'dbname='.DB_NAME, DB_USER, DB_PASSWD);
        $this->tableName = $this->getTableName();
    }

    public function selectAllRecords(){
        $fields = $this->getFields();
        return $this->connect->query("SELECT $fields FROM $this->tableName")->fetchAll();
    }
    public function selectRecordById($id){
        $fields = $this->getFields();
        return $this->connect->query("SELECT $fields FROM $this->tableName WHERE id=$id")->fetch();
    }

     public function insert($post,$key){
        echo "INSERT INTO $this->tableName ($key) VALUES ('{$post[$key]}')";
        $this->connect->query("INSERT INTO $this->tableName ($key) VALUES ('{$post[$key]}')");
    }
    public function update(array $post, $key){
        if(empty($post[$key])&&empty($post['id'])) {echo 'fill fields'; return;}
        $this->connect->query("UPDATE $this->tableName SET $key = '{$post[$key]}'
        WHERE id = {$post['id']}");
    }

    private function getTableName(){
        $result = trim(get_class($this), 'Model');
        if($result[strlen($result)-1] == 'y') return $result = trim($result, 'y').'ies';
        return $result.'s';
    }
    public function getFields(){
       if(empty($this->fields)) echo 'fill in the fields!';
       return implode($this->fields,',');
    }
    public function getIdByColumn($name,$column){
        $table = $this->getTableName();
        return $this->connect->query("SELECT id FROM $table WHERE $column = '$name'")->fetch()['id'];
    }



}
