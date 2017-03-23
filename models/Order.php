<?php

class Order
{
    static function getOrdersByConsumerId($consumer_id){
        $db = Db::getConnection();
        $sql = 'SELECT
                users.`name`,
                order_list.id,
                order_list.date,
                order_list.sum
                FROM
                order_list
                INNER JOIN consumer_distributor ON order_list.consumer_distributor_id = consumer_distributor.id 
                INNER JOIN users ON consumer_distributor.distributor_id = users.id
                WHERE consumer_distributor.consumer_id = :id';

        $orders = array();

        $result = $db->prepare($sql);
        $result->bindParam(':id', $consumer_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $x = 0;
        while($row = $result->fetch()){
            $orders[$x] = $row;
            $x++;
        }

        return $orders;
    }

    static function getOrdersByDistributorId($distributor_id){
        $db = Db::getConnection();
        $sql = 'SELECT
                users.`name`,
                order_list.id,
                order_list.date,
                order_list.sum
                FROM
                order_list
                INNER JOIN consumer_distributor ON order_list.consumer_distributor_id = consumer_distributor.id 
                INNER JOIN users ON consumer_distributor.consumer_id = users.id
                WHERE consumer_distributor.distributor_id = :id';

        $orders = array();

        $result = $db->prepare($sql);
        $result->bindParam(':id', $distributor_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $x = 0;
        while($row = $result->fetch()){
            $orders[$x] = $row;
            $x++;
        }

        return $orders;
    }

    static function createOrder($id){
        $db = Db::getConnection();
        $sql = 'INSERT INTO order_list (consumer_distributor_id) VALUES (:id)';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();

        $sql = 'SELECT max(id) from order_list';

        $result = $db->prepare($sql);
        $result->execute();

        $row = $result->fetch();
        return $row[0];
    }

    static function fillOrder($order_id, $products){
        foreach ($products as $p) {
            $db = Db::getConnection();
            $sql = 'INSERT INTO order_content (order_id, product_id, count) VALUES (:order_id, :p_id, :count)';

            $result = $db->prepare($sql);
            $result->bindParam(':order_id', $order_id);
            $result->bindParam(':p_id', $p['product']);
            $result->bindParam(':count', $p['count']);
            $result->execute();
        }

        return true;
    }

    static function getOrderContent($order_id){
        $db = Db::getConnection();
        $sql = 'SELECT
                product.`name`,
                product.measure,
                order_content.id,
                order_content.price,
                order_content.count
                FROM
                order_list
                INNER JOIN order_content ON order_content.order_id = order_list.id
                INNER JOIN product ON order_content.product_id = product.id
                WHERE order_list.id = :id';

        $products = array();

        $result = $db->prepare($sql);
        $result->bindParam(':id', $order_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $x = 0;
        while($row = $result->fetch()){
            $products[$x] = $row;
            $x++;
        }

        return $products;
    }

    static function getProductsByDistributor($distributor_id){
        $db = Db::getConnection();
        $sql = 'SELECT
                id,
                `name`
                FROM
                product
                WHERE distributor_id = :id';

        $products = array();

        $result = $db->prepare($sql);
        $result->bindParam(':id', $distributor_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $x = 0;
        while($row = $result->fetch()){
            $products[$x] = $row;
            $x++;
        }

        return $products;
    }

    static function updateOrderSum($order_id, $sum){
        $db = Db::getConnection();
        $sql = 'UPDATE order_list
                SET 
                `sum` = :sum
                WHERE
                id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':sum', $sum);
        $result->bindParam(':id', $order_id);
        $result->execute();

        return true;
    }

    static function updateOrderDate($order_id, $date){
        $db = Db::getConnection();
        $sql = 'UPDATE order_list
                SET 
                `date` = :date
                WHERE
                id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':date', $date);
        $result->bindParam(':id', $order_id);
        $result->execute();

        return true;
    }

    static function updateOrderRecord($id, $count, $price){
        $db = Db::getConnection();
        $sql = 'UPDATE order_content
                SET 
                count = :count,
                price = :price
                WHERE
                id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->bindParam(':count', $count);
        $result->bindParam(':price', $price);
        $result->execute();

        return true;
    }

    static function deleteOrder($order_id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM
                order_list
                WHERE
                id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $order_id);
        $result->execute();

        return true;
    }
}