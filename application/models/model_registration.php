<?php
	/**
	* ModelRegistration
	* 
	* Клас моделi сторинки регистрации
	* 
	* @package application/models
	* @author Автор ... трололо
	* @version 1.0
	*/
	class ModelRegistration extends Model{
            

            /**
            * Конструктор __construct 
            * 
            */
            function __construct(){
                parent::__construct();
            }

            public function actionAddNewUser($login, $paswrd){
                $query = $this->_query("INSERT INTO _users (login, paswrd, online) VALUES ('$login', '$paswrd', 0)");
                if($query) return true; else return false;
                              
            }
                
        }