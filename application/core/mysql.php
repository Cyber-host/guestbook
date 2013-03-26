<?php
    class MySQL{
        
        private $dataBaseObj    =   null;
        
	/**
	* _connect стандартний метод зеднання з базою
	* 
	* @param string $pHost хост сервера базы
	* @param string $pUser юзер логин базы
	* @param string $pPass пароль базы
	* @return resource/boolean
	*/
        protected function _connect($pHost, $pUser, $pPass){
            $this->dataBaseObj = mysql_connect($pHost, $pUser, $pPass);
            return $this->dataBaseObj;
        }
            
        
	/**
	* _select стандартний метод выбору базы
	* 
	* @param string $pDatabaseName имя базы
	* @return boolean
	*/
        protected function _select($pDatabaseName){
            return mysql_select_db($pDatabaseName);
        }
        
        
	/**
	* _query стандартний метод запиту до базы
	* 
	* @param string $pData строка запыту
	* @return resource/boolean
	*/
        protected function _query($pData){
            return mysql_query($pData);
        }
        
        
        
        /**
	* _query стандартний метод закрывання зеднання з базою
	* 
	*/
        protected function _close(){
            mysql_close($this->dataBaseObj);
        }
    }
    

