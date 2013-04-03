<?php
	/**
	* Model
	* 
	* Клас для роботи з базами данних
	* 
	* @package application/core
	* @author Автор ... трололо
	* @version 1.0
	*/
	class Model{
                
            
		private $loginUserDB		=	"any_user";
		private $paswdUserDB		=	"password";
		private $hostUserDB		=	"localhost";
		private $dataBaseName		=	"GUEST";
		protected $table1		=	"_guestdata";
                protected $table2		=	"_users";
                protected static $dataBaseObj   =       null;
		private $error                  =	false;
		
		
		/**
		* __construct зеднання з базою
		* 
		*/
		public function __construct(){
                    $this->connection($this->hostUserDB, $this->loginUserDB, $this->paswdUserDB, $this->dataBaseName);
		}
                

                private static function connection($pHost, $pUser, $pPass, $pDatabaseName){
                    if(!isset(Model::$dataBaseObj)){
                        Model::$dataBaseObj    =   new mysqli($pHost, $pUser, $pPass, $pDatabaseName);
                    }

                }

        
                /**
                * _query метод закрывання зеднання з базою
                * 
                */
                protected function _close(){
                    Model::$dataBaseObj->close();
                }
		
		

		
		
                /**
                * _query метод запиту до базы
                * 
                * @param string $pData строка запыту
                * @return resource/boolean
                */
                protected function _query($pData){
                    return Model::$dataBaseObj->query($pData);
                }
	    
	}
	
