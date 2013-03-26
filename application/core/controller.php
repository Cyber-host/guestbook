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
    
	    public $model;
	    public $view;
    
	    function __construct(){
		$this->view = new View();
	    }
    
	    function actionIndex(){
	    }
	}
?>


