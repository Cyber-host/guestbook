<?php
	/**
	* Controller
	* 
	* 
	* @package application/core
	* @author Автор ... трололо
	* @version 1.0
	*/
	class Controller{
    
	    public $model = null;
	    public $view = null;
    
	    function __construct(){
		//$this->view = new View();
	    }
    
	    public function actionIndex(){
	    }
            
            public function redirect($time, $url){
                header('Refresh: '.$time.'; URL='.$url);
                exit;
            }
	}
?>


