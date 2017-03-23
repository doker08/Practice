<?php

include_once(ROOT."/models/Admin.php");
include_once(ROOT."/models/User.php");
include_once(ROOT."/models/Consumer.php");
include_once(ROOT."/models/Distributor.php");

class AdminController
{
    /**
     * Домашня страница администратора. Меню.
     *
     * @return bool
     */
    function actionIndex(){
        if(!Admin::isAdmin()){
            require_once(ROOT . '/views/permission_denied.php');
            return true;
        }

        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

	/**
     * Показать список потребителей.
     */
    function actionShowConsumers(){
        if(!Admin::isAdmin()){
            require_once(ROOT . '/views/permission_denied.php');
            return true;
        }

        $users = Consumer::getAllConsumers();
        require_once(ROOT . '/views/admin/consumer_list.php');
        return true;
    }
	
	/**
     * Показать список поставщиков.
     */
    function actionShowDistributors(){
        if(!Admin::isAdmin()){
            require_once(ROOT . '/views/permission_denied.php');
            return true;
        }

        $users = Distributor::getAllDistributors();
        require_once(ROOT . '/views/admin/distributor_list.php');
        return true;
    }

    /**
     * Показать поставщиков потребителя.
     *
     * @param $consumer_id
     * @return bool
     */
    function actionConsumerDistributors($consumer_id){
        $distributors = array();
        $distributors = Distributor::getDistributors($consumer_id);

        $consumer = User::getUserById($consumer_id);

        require_once(ROOT . '/views/admin/consumer_distributor_list.php');

        return true;
    }

	
    /**
     * Добавление поставщика для потребителя.
     *
     * @param $consumer_id
     * @return bool
     */
    function actionConsumerDistributorsAdd($consumer_id){
        $result = false;
        if (isset($_POST['submit'])) {
            $cons = $_POST['consumer'];
            $dist = $_POST['distributor'];
            if(Consumer::addConsumerDistributor($cons, $dist)){
                $result = "Запись успешно добавлена.";
            }
        }

        $consumer = User::getUserById($consumer_id);
        $distributors = Distributor::getAllDistributors();
        require_once(ROOT . '/views/admin/consumer_distributor_add.php');

        return true;
    }

    /**
     * Отобразить меню управления пользователем.
     *
     * @param $id
     * @return bool
     */
    function actionManageUser($id){
        if(!Admin::isAdmin()){
            require_once(ROOT . '/views/permission_denied.php');
            return true;
        }

        $user = User::getUserById($id);

        require_once(ROOT . '/views/admin/user/user.php');
        return true;
    }

    /**
     * Страница редактироования почты пользователя от
     * имени администратора.
     *
     * @param $id
     * @return bool
     */
    function actionEditUserMail($id){
        if(!Admin::isAdmin()){
            require_once(ROOT . '/views/permission_denied.php');
            return true;
        }

        $result = false;
        if (isset($_POST['submit'])) {
            $newmail = $_POST['email'];

            $result = User::setEmail($id, $newmail);
        }

        $user = User::getUserById($id);
        $email = $user['email'];

        require_once(ROOT . '/views/admin/user/edit_mail.php');

        return true;
    }

    /**
     * Страница редактирования имени пользователя от имени администратора.
     *
     *
     * @param $id
     * @return bool
     */
    function actionEditUserName($id){
        if(!Admin::isAdmin()){
            require_once(ROOT . '/views/permission_denied.php');
            return true;
        }

        $result = false;
        if (isset($_POST['submit'])) {
            $newname = $_POST['name'];
            $result = User::editName($id, $newname);
        }

        $user = User::getUserById($id);
        $name = $user['name'];

        require_once(ROOT . '/views/admin/user/edit_name.php');

        return true;
    }

    /**
     * Заблокировать пользователя.
     *
     * @param $id
     * @return bool
     */
    function actionBlockUser($id){
        if(!Admin::isAdmin()){
            require_once(ROOT . '/views/permission_denied.php');
            return true;
        }

        $result = User::block($id);

        $this->actionManageUser($id);
        return true;
    }

    /**
     * Разблокировать пользователя.
     *
     * @param $id
     * @return bool
     */
    function actionUnBlockUser($id){
        if(!Admin::isAdmin()){
            require_once(ROOT . '/views/permission_denied.php');
            return true;
        }

        $result = User::unblock($id);

        $this->actionManageUser($id);
        return true;
    }
}