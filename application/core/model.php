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
	class Model extends MySQL{
                
            
		private $loginUserDB		=	"any_user";
		private $paswdUserDB		=	"password";
		private $hostUserDB		=	"localhost";
		private $dataBaseName		=	"GUEST";
		private $table1			=	"_guestdata";
		private $error                  =	false;
		
		
		/**
		* __construct зеднання з базою
		* 
		*/
		public function __construct(){
                        $link = $this->_connect($this->hostUserDB, $this->loginUserDB, $this->paswdUserDB, $this->dataBaseName);
			if(!$link){ $this->error = true; $this->_close();}
                        if(!$this->error) $this->_select($this->dataBaseName);
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
		protected function _getAllInf($start=0, $numbers=10, $flagNumber=false, $flagLongText=false){
			$arrayAllElements = array();
			
                        if(gettype($start) == "integer" && gettype($numbers) == "integer" && gettype($flagNumber) == "boolean" && gettype($flagLongText) == "boolean"){
                            $select = $this->_query("SELECT id, name, short_text, ".($flagLongText ? "long_text," : "")." datecreate, datechange FROM $this->table1 ORDER BY id DESC ".($flagNumber ? "LIMIT $start, $numbers" : ""));
                            
                            if(!$select) return false;
                            
                            while ($row = mysql_fetch_array($select)) {
                                $arrayAllElements[] = array(
                                                        'id' =>$row['id'], 
                                                        'name' => $row['name'], 
                                                        'short_text' => $row['short_text'], 
                                                        'long_text' => ($flagLongText ? ($row['long_text']) : "false"), 
                                                        'datecreate' => $row['datecreate'], 
                                                        'datechange' => $row['datechange']
                                                      );
                            }
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
		protected function _getAboutIdInf($pId){
			$arrayAllElements = array();
			
			$select = $this->_query("SELECT id, name,  long_text, datecreate, datechange FROM $this->table1");
                        if(!$select) return false;
                        while ($row = mysql_fetch_array($select)) {
				if($pId == $row['id']){
					$arrayAllElements = array('id' =>$row['id'], 'name' => $row['name'], 'long_text' => $row['long_text'], 'datecreate' => $row['datecreate'], 'datechange' => $row['datechange']);
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
		protected function _updateDataAboutId($pId, $pName, $pText){
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
		protected function _addInf($pName, $pShort_text, $pLong_text, $pDate_create){
			return (bool)$this->_query("INSERT INTO $this->table1 (name, short_text, long_text, datecreate) VALUES ('$pName', '$pShort_text', '$pLong_text', $pDate_create)");

		}
		
		
		/**
		* Метод delInf видалення записив з бази
		* 
		* @param int $pId iндекс по якому буде видалений пост
		* @return boolean
		*/
		protected function _delInf($pId){
                    settype($pId, 'integer');
                    if(gettype($pId) != "integer") return false;
                    return (bool)$this->_query("DELETE FROM $this->table1 WHERE id=$pId");
		}
		
		
		/**
		* Метод getNumberElements вибир к-стi елементив в базi
		* 
		* @return boolean/int
		*/
		protected function _getNumberElements(){
                   // $link = mysql_query("select count(*) cnt from ".$this->table1);
                    $link = $this->_query("select count(*) cnt from ".$this->table1);
                    if($link){
                        $numOL = mysql_fetch_array($link);
                        return $numOL[0];
                    }else{
                        return false;
                    }
		}
	
	
		/**
		* Метод get_data отримання данних
		* 
		*/
		public function getData($action){
		
		}
	    
	}
	
