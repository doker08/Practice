<?php

include_once(ROOT."/models/Order.php");
include_once(ROOT . "/models/Distributor.php");
include_once(ROOT."/models/Consumer.php");
include_once(ROOT."/models/User.php");
include_once(ROOT."/models/Product.php");

class DistributorController
{
    function actionIndex(){
        require_once(ROOT . '/views/distributor/index.php');
        return true;
    }

    function actionConsumer(){
        $user_id = User::checkLogged();

        $consumers = array();
        $consumers = Consumer::getConsumers($user_id);

        require_once(ROOT . '/views/distributor/consumer_list.php');

        return true;
    }

    function actionOrderList(){
        $user_id = User::checkLogged();

        $orders = array();
        $orders = Order::getOrdersByDistributorId($user_id);

        require_once(ROOT . '/views/distributor/order_list.php');
        return true;
    }

    function actionTimetable(){
        require_once(ROOT . '/views/distributor/timetable.php');
        return true;
    }

    function actionOrderContent($order_id){
        $products = array();
        $products = Order::getOrderContent($order_id);

        $sum = 0;
        foreach($products as $p){
            $product_sum = $p['price'] * $p['count'];

            $p['product_sum'] = $product_sum;
            $sum += $product_sum;
        }

        require_once(ROOT . '/views/distributor/order_content.php');
        return true;
    }

    function actionOrderEdit($order_id){
        $result = null;

        if(isset($_POST['submit'])){
            $product = array();
            $price = array();
            $count = array();
            $sum = 0;
            $date = null;

            if (isset($_POST['product'])){
                $product = $_POST['product'];
                $price = $_POST['price'];
                $count = $_POST['count'];
                $date = $_POST['date'];
            }

            for($i = 0; $i < count($product); $i++){
                Order::updateOrderRecord($product[$i], $count[$i], $price[$i]);
                $sum += $price[$i] * $count[$i];
            }

            Order::updateOrderSum($order_id, $sum);
            Order::updateOrderDate($order_id, $date);
            $result = "Заявка обновлена.";
        }

        $products = array();
        $products = Order::getOrderContent($order_id);

        require_once(ROOT . '/views/distributor/order_edit.php');
        return true;
    }

    function actionOrderDelete($order_id){
        Order::deleteOrder($order_id);
        $this->actionOrderList();
        $result = null;
    }

    function actionProducts(){
        $user_id = User::checkLogged();

        $products = Product::getProducts($user_id);

        require_once(ROOT . '/views/distributor/product.php');
        return true;
    }

    function actionProductEdit($product_id){
        $result = null;

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $measure = $_POST['measure'];

            Product::editProduct($product_id, $name, $measure);
            $result = "Товар обновлен.";
        }

        $product = Product::getProduct($product_id);

        require_once(ROOT . '/views/distributor/product_edit.php');
        return true;
    }

    function actionProductDelete($product_id){
        Product::deleteProduct($product_id);
        $this->actionProducts();

        return true;
    }

    function actionProductAdd(){
        $result = null;

        if(isset($_POST['submit'])){
            $user_id = User::checkLogged();
            $name = $_POST['name'];
            $measure = $_POST['measure'];

            Product::addProduct($user_id, $name, $measure);
            $result = "Товар добавлен.";
        }

        require_once(ROOT . '/views/distributor/product_create.php');
        return true;
    }
}