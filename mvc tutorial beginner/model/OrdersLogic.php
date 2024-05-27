<?php

require_once 'model/DataHandler.php';


class OrdersLogic
{
    public $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "dishes", "root", "");
    }

    public function createOrder($formData)
    {
        $total = $formData['total'];

        foreach ($formData['items'] as $itemName => $itemType) {
            var_dump($itemName, $itemType, $total);
            try {
                $sql = "INSERT INTO orders (order_id, menu_item, total_cost) VALUES (1, '$itemName', '$total')";
                $result = $this->DataHandler->createData($sql);
                echo 'kut pdo';
            } catch (Exception $e) {
                return $e;
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function deleteOrder($id){
        try{
            $sql = "DELETE from orders WHERE id=" . $id;
            $result = $this->DataHandler->deleteData($sql);
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }

    public function readAllOrders(){
        try{
            $query = "SELECT * FROM orders";
            $data = $this->DataHandler->readAllData($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            $result = $data->fetchAll();
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
}

