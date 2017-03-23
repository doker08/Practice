<?php

class Distributor
{
    static function getAllDistributors(){
        $db = Db::getConnection();
        $sql = 'SELECT
                    users.id,
                    users.`name`,
                    users.phone
                FROM
                    users
                WHERE
                    user_type = :type';

        $distributors = array();

        $type = DISTRIBUTOR;
        $result = $db->prepare($sql);
        $result->bindParam(':type', $type);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $x = 0;
        while($row = $result->fetch()){
            $distributors[$x] = $row;
            $x++;
        }

        return $distributors;
    }

    static function getDistributors($consumer_id){
        $db = Db::getConnection();
        $sql = 'SELECT
                    users.id,
                    users.`name`,
                    users.phone,
                    consumer_distributor.id as cd_id
                FROM
                    users
                LEFT JOIN consumer_distributor ON consumer_distributor.distributor_id = users.id
                WHERE
                    consumer_distributor.consumer_id = :id';

        $distributors = array();

        $result = $db->prepare($sql);
        $result->bindParam(':id', $consumer_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $x = 0;
        while($row = $result->fetch()){
            $distributors[$x] = $row;
            $x++;
        }

        return $distributors;
    }
}