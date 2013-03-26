<?php
	/**
	* Model_Main
	* 
	* Клас моделi головнои сторинки
	* 
	* @package application/models
	* @author Автор ... трололо
	* @version 1.0
	*/
	class ModelMain extends Model{
	
		/**
		* Конструктор __construct 
		* 
		*/
		function __construct(){
			parent::__construct();
		}
	
	
	
		/**
		* Метод get_data отримання данних з бази
		* 
		* @param int $posts число вид якого id брати дани
		* @retrun array массив данних
		*/
		public function getData($posts){
			return $this->_getAllInf($posts, 10, true, false);
		}
                
                
                
		/**
		* Метод addPost добавляе новий пост в базу
		* 
		* @param string $namePost i'мя юзера
		* @param string $textUser повний текст
		* @param string $textShortUser короткий текст
		* @return boolean
		*/
		public function addPost($namePost, $textUser, $textShortUser){
			return $this->_addInf($namePost, $textShortUser, $textUser, 'NOW()');

		}
                
                
                
                
		/**
		* Метод get_data вибiр iнформацiи для данного поста
		* 
		* @param int $pId id поста
		* @return array
		*/
		public function getDataReadmore($pId){
			return $this->_getAboutIdInf($pId);

		}
                
                
                
		/**
		* Метод getDataEdit вибiр iнформацiи для данного поста
		* 
		* @param int $pId id поста для виведення данних якi будуть змiненi
		* @return array
		*/
		public function getDataEdit($pId){
			return $this->_getAboutIdInf($pId);

		}
		
		
		/**
		* Метод updateDataEdit запис змiнених данних
		* 
		* @param int $pId id юзера для змiни
		* @param string $pName i'мя юзера
		* @param string $pText повний текст
		* @return boolean
		*/
		public function updateDataEdit($pId, $pName, $pText){
			return $this->_updateDataAboutId($pId, $pName, $pText);
		}
                
                
                
                
		/**
		* Метод get_data видалення поста
		* 
		* @param int $pId id поста
		* @return array
		*/
		public function deleteData($pId){
			return $this->_delInf($pId);

		}
                
                
                
                
                
                
		
		
		/**
		* Метод get_number_elements отримання к-стi елементив в базi
		* 
		* @retrun int к-сть записiв
		*/
		public function getNumberElements(){
			return $this->_getNumberElements();
		}
	
	}
	
?>