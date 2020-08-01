<?php

class Database {
    /*
     * @var PDO
    */
    private $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    /*
    * @param integer $id
    * @return Model
    */
    public function getById($table, $id){
        $stm = $this->pdo->prepare('SELECT * FROM '.$table.' WHERE `id` = :id');
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row: [];
    }
    public function _readAll($table,$start,$limit){
        $stm = $this->pdo->prepare('SELECT * FROM '.$table." LIMIT $start,$limit");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }
    public function readAll($table){
        $stm = $this->pdo->prepare('SELECT * FROM '.$table);
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }
    public function _getById($table,$column,$id){
        $stm = $this->pdo->prepare('SELECT * FROM '.$table . ' where '.$column .'=' ."'". $id . "'");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }
    public function runQuery($query){
        if (!empty($query)){
            return $this->pdo->query($query);
        }else{
            return false;
        }
    }
    public function create($table, $params) {
        $sql='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';
        $this->pdo->query($sql);
    }
    /**
     * @param $table
     * @param $id
     * @return bool
     */
    public function delete($table, $id)
    {
        $stm = $this->pdo->prepare('DELETE FROM '.$table.' WHERE id = :id');
        $stm->bindParam(':id', $id);
        $success = $stm->execute();
        return ($success);
    }

    public function save($table, $data){
        if (isset($data['id'])){
            $this->update($table, $data['id'], $data);
        }else{
            return $this->create($table, $data);
        }
    }

    public function search($param)
    {
        $sql = "select * from product where name like '%$param%'";
        $stm = $this->pdo->prepare($sql);
        $status = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($status) ? $row: [];
    }
}