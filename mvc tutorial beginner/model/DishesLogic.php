<?php

require_once 'model/DataHandler.php';

class DishesLogic{
    public $DataHandler;

    public function __construct(){
        $this->DataHandler = new DataHandler("localhost", "mysql", "dishes", "root", "");
    }

    public function __destruct(){

    }

    public function createDish($name, $cost, $type){
        try{
            $sql = "INSERT INTO items (name, cost, type) VALUES ('$name', '$cost', '$type')";
            $result = $this->DataHandler->createData($sql);
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }

    public function readDish($id, $dish){
        try {
            $sql = "SELECT * FROM " . $dish . " WHERE id=" . $id;
            $data = $this->DataHandler->readData($sql);
            $result = $data->fetchall();
            return $result;
        } catch (Excetion $e){
            return $e;
        }
    }

    public function updateDish($name, $cost, $id, $dish){
        try {
            $sql = "UPDATE " . $dish . " SET name='{$name}', cost='{$cost}' WHERE id=" . $id;
            $result = $this->DataHandler->updateData($sql);
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }

    public function deleteDish($id){
        try{
            $sql = "DELETE from items WHERE id=" . $id;
            $result = $this->DataHandler->deleteData($sql);
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }

    public function readCategoryDishes($dish){
        try {
            $sql = "SELECT * FROM items WHERE type='" . $dish . "'";
            $data = $this->DataHandler->readAllData($sql);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            $result = $data->fetchall();
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }

    public function readAllDishes(){
        try{
            $query = "SELECT * FROM items";
            $data = $this->DataHandler->readAllData($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            $result = $data->fetchAll();
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
}

?>