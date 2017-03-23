<?php

class Consumer
{
    static function getAllConsumers(){
        $db = Db::getConnection();
        $sql = 'SELECT
                    id,
                    `name`,
                    phone
                FROM
                    users
                WHERE
                    user_type = :type';

        $consumers = array();

        $type = CONSUMER;
        $result = $db->prepare($sql);
        $result->bindParam(':type', $type);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $x = 0;
        while($row = $result->fetch()){
            $consumers[$x] = $row;
            $x++;
        }

        return $consumers;
    }

    static function getConsumers($distributor_id){
        $db = Db::getConnection();
        $sql = 'SELECT
                    users.id,
                    users.`name`,
                    users.phone,
                    consumer_distributor.id as cd_id
                FROM
                    users
                LEFT JOIN consumer_distributor ON consumer_distributor.consumer_id = users.id
                WHERE
                    consumer_distributor.distributor_id = :id';

        $consumers = array();

        $result = $db->prepare($sql);
        $result->bindParam(':id', $distributor_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $x = 0;
        while($row = $result->fetch()){
            $consumers[$x] = $row;
            $x++;
        }

        return $consumers;
    }

    static function addProductToOrder($order_id){


    }

    static function findConsumerDist($cons_id, $dist_id){
        $db = Db::getConnection();
        $sql = 'SELECT id FROM consumer_distributor WHERE consumer_id = :c_id AND distributor_id = :d_id';

        $result = $db->prepare($sql);
        $result->bindParam(':c_id', $cons_id);
        $result->bindParam(':d_id', $dist_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $row = $result->fetch();

        if(isset($row)){
            return $row['id'];
        }

        return false;
    }

    static function addConsumerDistributor($cons_id, $dist_id){
        $db = Db::getConnection();
        $sql = 'INSERT INTO consumer_distributor (consumer_id, distributor_id)
                VALUES (:consumer_id, :ditributor_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':consumer_id', $cons_id);
        $result->bindParam(':ditributor_id', $dist_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return true;
    }
}