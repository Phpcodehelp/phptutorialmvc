<?php

require_once 'controller/OrdersController.php';
require_once 'controller/DishesController.php';

class MainController{
    private $OrdersController;
    private $DishesController;
    
    public function __construct(){
        $this->OrdersController = new OrdersController();
        $this->DishesController = new DishesController();
    }

    public function __destruct(){

    }

    public function handleRequest(){
        try {
            $controller = isset($_GET['con']) ? $_GET['con'] : '';

            switch ($controller){
                case 'orders':
                    $this->OrdersController->handleRequest();
                    break;
                case 'dishes':
                    $this->DishesController->handleRequest();
                    break;
                default:
                    $this->DishesController->handleRequest();
                    break;
            }
        } catch (Exception $e){
            return $e;
        }
    }
};

?>