<?php
	/**
	* ModelAuthorization
	* 
	* Клас моделi сторинки авторизации
	* 
	* @package application/models
	* @author Автор ... трололо
	* @version 1.0
	*/
	class ModelAuthorization extends Model{
            

            /**
            * Конструктор __construct 
            * 
            */
            function __construct(){
                parent::__construct();
            }
            
            
            public function checkUser($login, $paswrd){
                $select = $this->_query("SELECT id, login, paswrd FROM $this->table2");
                while($row = mysqli_fetch_assoc($select))
                        if($login == $row['login'] && $paswrd == $row['paswrd']) return array(true, $row['id']); 
                return array(false);        
            }

                
        }