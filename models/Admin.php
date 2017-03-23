<?php
class Admin{
    /**
     * Проверка статуса пользователя.
     *
     * @return bool
     */
    public static function isAdmin(){
        if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == ADMIN)
            return true;

        return false;
    }
}