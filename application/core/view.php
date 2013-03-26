<?php
	/**
	* View
	* 
	* Клас для вiдображення контенту
	* 
	* @package application/core
	* @author Автор ... трололо
	* @version 1.0
	*/
	class View{
		/**
		* Метод generate генерування виду
		* 
		* @param string $pContentView html вигляд для данного контенту
		* @param string $pTemplateView html загальний контент
		* @param string/int/array/boolean... $pData данi будь якого типу
		* @param string $title $pTitle даноi сторинки
		* @param string/int/array/boolean... $pOther данi будь якого типу
		*/
		function generate($pContentView, $pTemplateView, $pData = null, $pTitle="non", $pOther=0){
		
			$title		=	$pTitle;
			$other		=	$pOther;
		
			$allInformation = $pData;
			include 'application/views/'.$pTemplateView;
		}
	}
?>