<?php

include_once(ROOT."/models/Order.php");
include_once(ROOT . "/models/Distributor.php");
include_once(ROOT."/models/Consumer.php");
include_once(ROOT."/models/User.php");

class ConsumerController
{
	/**
	 * Домашняя страница потребителя.
	 */
    function actionIndex(){
        require_once(ROOT . '/views/consumer/index.php');
        return true;
    }

	/**
	 * Страница поставщиков потребителя.
	 */
    function actionDistributors(){
        $user_id = User::checkLogged();

        $distributors = array();
        $distributors = Distributor::getDistributors($user_id);

        require_once(ROOT . '/views/consumer/distributors.php');
        return true;
    }

	/**
	 * Страница дат поставок для потребителя.
	 */
    function actionTimetable(){
        $user_id = User::checkLogged();

        $orders = array();
        $orders = Order::getOrdersByConsumerId($user_id);
        require_once(ROOT . '/views/consumer/order_list.php');
        return true;
    }

	/**
	 * Показать содержимое заказа.
	 */
    function actionOrderContent($order_id){
        $products = array();
        $products = Order::getOrderContent($order_id);

        $sum = 0;
        foreach($products as $p){
            $product_sum = $p['price'] * $p['count'];

            $p['product_sum'] = $product_sum;
            $sum += $product_sum;
        }

        require_once(ROOT . '/views/consumer/order_content.php');
        return true;
    }

	/**
	 * Создание нового заказа.
	 */
    function actionOrderCreate(){
        $result = null;

        $user_id = User::checkLogged();
        $distributors = Distributor::getDistributors($user_id);
        $distributorProducts = null;
        $dist = null;

        if(isset($_POST['distributor'])){
            $dist = $_POST['distributor'];
            $distributorProducts = Order::getProductsByDistributor($dist);
        }

        if(isset($_POST['submit'])){
            $products = array();
            if(isset($_POST['product'])){
                for ($i = 0; $i < count($_POST['product']); $i++){
                    $products[$i]['product'] = $_POST['product'][$i];
                    $products[$i]['count'] = $_POST['count'][$i];
                }

                $cd = Consumer::findConsumerDist($user_id, $dist);
                $order_id = Order::createOrder($cd);
                Order::fillOrder($order_id, $products);
            }

            $result = true;
        }
        require_once(ROOT . '/views/consumer/order_create.php');
        return true;
    }

    function actionOrderEdit($id){
        return true;
    }

    function actionOrderDelete($id){
        return true;
    }
}