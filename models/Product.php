<?php

/**
 * Created by PhpStorm.
 * User: sokol_000
 * Date: 07.03.2017
 * Time: 3:03
 */
class Product
{
    static function getProducts($distributor_id){
        $db = Db::getConnection();
        $sql = 'SELECT
            product.id,
            product.`name`,
            product.measure
        FROM
            product
        WHERE
            product.distributor_id = :id';

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

    static function getProduct($product_id){
        $db = Db::getConnection();
        $sql = 'SELECT
            product.id,
            product.distributor_id,
            product.`name`,
            product.measure
        FROM
            product
        WHERE
            product.id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $product_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $product = $result->fetch();

        return $product;
    }

    static function editProduct($product_id, $name, $measure){
        $db = Db::getConnection();
        $sql = 'UPDATE product
            SET
            `name` = :name,
            measure = :measure
        WHERE
            id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $product_id);
        $result->bindParam(':name', $name);
        $result->bindParam(':measure', $measure);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return true;
    }



    static function deleteProduct($product_id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM
                product
                WHERE
                id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $product_id);
        $result->execute();

        return true;
    }

    static function addProduct($distributor_id, $name, $measure){
        $db = Db::getConnection();
        $sql = 'INSERT INTO product (distributor_id, `name`, measure) VALUES (:dist_id, :name, :measure)';

        $result = $db->prepare($sql);
        $result->bindParam(':dist_id', $distributor_id);
        $result->bindParam(':name', $name);
        $result->bindParam(':measure', $measure);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return true;
    }
}