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
		* Метод deleteData видалення записив з бази
		* 
		* @param int $pId iндекс по якому буде видалений пост
		* @return boolean
		*/
		public function deleteData($pId){
                    settype($pId, 'integer');
                    if(gettype($pId) != "integer") return false;
                    return (bool)$this->_query("DELETE FROM $this->table1 WHERE id=$pId");
		}
                
                
                
		/**
		* Метод getAllInf зеднання з базою
		* 
		* @param int $start индекс вид якого починаеться вибир 
		* @param int $numbers к-сть елементив
		* @param boolean $flagNumber вкл/викл @param1 и @param2
		* @param boolean $flagLongText вкл/викл вивiд long_text
		* @return array
		*/
		public function getAllInf($start=0, $numbers=10, $flagNumber=false, $flagLongText=false){
			$arrayAllElements = array();
			
                        if(gettype($start) == "integer" && gettype($numbers) == "integer" && gettype($flagNumber) == "boolean" && gettype($flagLongText) == "boolean"){
                            $select = $this->_query("SELECT id, name, short_text, ".($flagLongText ? "long_text," : "")." datecreate, datechange FROM $this->table1 ORDER BY id DESC ".($flagNumber ? "LIMIT $start, $numbers" : ""));
                            
                            $allElementsRow = $this->getElements($select);
                            
                            foreach($allElementsRow as $key => $value)
                                $arrayAllElements[] = array(
                                    'id'            => array($value['id'], '{ID}'), 
                                    'name'          => array($value['name'], '{NAME}'), 
                                    'short_text'    => array($value['short_text'], '{SHORT_TEXT}'), 
                                    'long_text'     => array((isset($row['longtext']) ? $row['longtext'] : "false"), '{LONG_TEXT}'), 
                                    'datecreate'    => array($value['datecreate'], '{DATE_CREATE}'), 
                                    'datechange'    => array($value['datechange'], '{DATE_CHANGE}')
                                );

                            return $arrayAllElements;
                        }else{
                            return false;
                        }
		}
                
                
/**
		* Метод getAboutIdInf вибiр данних з бази
		* 
		* @param int $pId iндекс елемента для вибору 
		* @return array/boolean
		*/
		public function getAboutIdInf($pId){
			$arrayAllElements = array();
			
			$select = $this->_query("SELECT id, name,  long_text, datecreate, datechange FROM $this->table1");
                        if(!$select) return false;
                        while ($row = mysqli_fetch_assoc($select)) {
				if($pId == $row['id']){
                                        $arrayAllElements = array('id' =>array($row['id'], '{ID}'), 'name' => array($row['name'], '{NAME}'), 'long_text' => array($row['long_text'], '{LONG_TEXT}'), 'datecreate' => array($row['datecreate'], '{DATE_CREATE}'), 'datechange' => array($row['datechange'], '{DATE_CHANGE}'));
					break;
				}
			}
			return $arrayAllElements;
		}
		
		
		
		
		
		/**
		* Метод updateDataAboutId замiни iнформацiи
		* 
		* @param int $pId iндекс елемента для змiни iнформацiи 
		* @param string $pName i'мя для замiни 
		* @param string $pText текст для замiни 
		* @return boolean
		*/
		public function updateDataAboutId($pId, $pName, $pText){
			$short_text = substr($pText, 0, 60).'...';
			return (bool)$this->_query("UPDATE $this->table1 SET name='$pName', short_text='$short_text', long_text='$pText', datechange=NOW() WHERE id=$pId");
		}
		
		
		
		
		/**
		* Метод addInf добавдення iнформацiи
		* 
		* @param string $pName i'мя поста 
		* @param string $pShort_text короткий текст поста 
		* @param string $pLong_text весь текст поста
		* @param date $pDate_create дата поста
		* @return boolean
		*/
		public function addInf($pName, $pShort_text, $pLong_text, $pDate_create){
			return (bool)$this->_query("INSERT INTO $this->table1 (name, short_text, long_text, datecreate) VALUES ('$pName', '$pShort_text', '$pLong_text', $pDate_create)");

		}
		
		

		
		
		/**
		* Метод getNumberElements вибир к-стi елементив в базi
		* 
		* @return boolean/int
		*/
		public function getNumberElements(){
                    $link = $this->_query("select count(*) cnt from ".$this->table1);
                    if($link){
                        $numOL = mysqli_fetch_assoc($link);
                        return $numOL['cnt'];
                    }else{
                        return false;
                    }
		}
                
		
		
		/**
		* Метод get_number_elements отримання к-стi елементив в базi
		* 
		* @retrun int к-сть записiв
		*
		public function getNumberElements(){
			return $this->_getNumberElements();
		}
                */
                
                /**
                * _getelements метод запиту до базы
                * 
                * @param string $pData данi з бази
                * @return resource/boolean
                */
                public function getElements($pData){

                    $buffArray = array();
                    while($row = mysqli_fetch_assoc($pData))
                            $buffArray[] = $row;
                    return $buffArray;
                }
                
                
	
	}
	
