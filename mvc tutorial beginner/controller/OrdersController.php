<?php

require_once 'model/OrdersLogic.php';
require_once 'model/Display.php';

class OrdersController
{
    private $OrdersLogic;
    private $Display;

    public function __construct()
    {
        $this->OrdersLogic = new OrdersLogic();
        $this->Display = new Display();
    }

    public function handleRequest()
    {
        try {
            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'create':
                    $this->collectCreateOrder();
                    break;
                case 'update':
                    $this->collectUpdateOrder($_REQUEST['id']);
                    break;
                case 'read':
                    $this->collectReadOrder($_REQUEST['id']);
                    break;
                case 'delete':
                    $this->collectDeleteOrder($_REQUEST['id']);
                    break;
                case 'readall':
                    $this->collectReadAllOrders();
                    break;
                case 'kitchen':
                    $this->collectKitchenOrders();
                    break;
                case 'bar':
                    $this->collectBarOrders();
                    break;
                default:
                    $this->collectReadAllOrders();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    // public function collectReadOrder($id){

    //     $res = $this->OrdersLogic->readOrder($id);
    //     $html = $this->Display->createTable($res, true);
    //     //$html2 = $this->Display->createSelect($res);

    //     include 'view/contacts/read.php';
    // }

    public function collectCreateOrder()
    {
        $items = $this->OrdersLogic->createOrder($_POST);
        //header("Location: index.php");
    }

    // public function collectUpdateOrder($id){
    //     $res = $this->OrdersLogic->readOrder($id);
    //     $contacts = $this->OrdersLogic->updateOrder($id);
    //     //$html2 = $this->Display->createSelect($res);
    //     $msg = "Het is gelukt om een persoon te updaten.";
    //     include 'view/contacts/update.php';
    // }

    public function collectDeleteOrder($id){   
        $res = $this->OrdersLogic->deleteOrder($id);
        include 'view/orders/delete.php';
    }

    public function collectReadAllOrders(){
        $result = $this->OrdersLogic->readAllOrders();
        $html = $this->Display->createTable("orders", $result);

        include 'view/orders/allorders.php';
    }

}
