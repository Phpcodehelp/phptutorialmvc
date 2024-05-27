<?php

require_once 'model/DishesLogic.php';
require_once 'model/Display.php';

class DishesController{
    private $DishesLogic;
    private $Display;

    public function __construct(){
        $this->DishesLogic = new DishesLogic();
        $this->Display = new Display();
    }

    public function handleRequest(){
        try{

            isset($_GET['con']) === 'dishes' ? $_GET['con'] : '';
            
            $op = isset($_GET['op']) ? $_GET['op'] : '';
            $dish = isset($_GET['dish']) ? $_GET['dish'] : 'main';

            switch ($op) {
                case 'create':
                    $this->collectCreateDish($dish);
                    break;
                case 'read':
                    $this->collectReadDish($_REQUEST['id'], $dish);
                    break;
                case 'delete':
                    $this->collectDeleteDish($_REQUEST['id'], $dish);
                    break;
                case 'update':
                    $this->collectUpdateDish($_REQUEST['id'], $dish);
                    break;
                case 'readcategory':
                    $this->collectReadCategoryDishes($dish);
                    break;
                case 'readall':
                    $this->collectReadAllDishes();
                    break;
                default:
                    $this->collectReadAllDishes();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectCreateDish($dish){
        if (isset($_REQUEST['create'])) {
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
            $cost = isset($_REQUEST['cost']) ? $_REQUEST['cost'] : null;
            $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : null;

            if (empty($name) or empty($cost) or empty($type)) {
                return "Alle velden zijn vereist";
            }

            try {
                $this->DishesLogic->createDish($name, $cost, $type);
            } catch (Exception $e){
                throw $e;
            }

        }
        include 'view/dishes/create.php';
    }

    public function collectReadDish($id, $dish){

        $res = $this->DishesLogic->readDish($id, $dish);
        $html = $this->Display->createTable($res, false, 'dishes');

        include 'view/dishes/read.php';
    }

    public function collectUpdateDish($id, $dish){
        $res = $this->DishesLogic->readAllDishes($id, $dish);

        if (isset($_REQUEST['update'])) {
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
            $cost = isset($_REQUEST['cost']) ? $_REQUEST['cost'] : null;

            if (empty($name) or empty($cost)) {
                return "Alle velden zijn vereist";
            } else {
                $data = $this->DishesLogic->updateDish($name, $cost, $dish);
            }
        }
        include 'view/dishes/update.php';
    }

    public function collectDeleteDish($id, $dish){
        $res = $this->DishesLogic->deleteDish($id);
        include 'view/dishes/delete.php';
    }

    public function collectReadCategoryDishes($dish){
        $data = $this->DishesLogic->readCategoryDishes($dish);
        $html = $this->Display->createTableDish("dishes", $data, $dish);
        include 'view/dishes.php';
    }

    public function collectReadAllDishes(){
        $data = $this->DishesLogic->readAllDishes();
        $html = $this->Display->createTableAllDishes($data);
        include 'view/orders.php';
    }
}

?>