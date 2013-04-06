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

                private $layout = null;

                /**
                 * construct
                 */
                public function __construct() {
                    $this->layout = 'layout';
                }
                
                
                
                
                
            
		/**
		* Метод generate генерування виду
		* 
		*/
		public function generate($pContentView, $data=null, $pSwitchLayout=true){
                    if($pSwitchLayout)
                        return $this->getContent($this->layout, array('content' => $this->getContent($pContentView, $data), 'title' => $data['title']));
                    else
                        return $this->getContent ($pContentView, $data);
		}
                
                
                
                
                
                /**
		* Метод getContent
		* 
		* @param string $pNameCont
                * @return string
		*/
                public function getContent($pNameCont, $data=""){ 
                    ob_start();
                    if($pNameCont != null) include 'application/views/'.$pNameCont.TYPE_FILE;
                    $content = ob_get_contents();
                    ob_end_clean();
                    return $content;
                }


                
                /**
		* Метод render
		* 
		* @param string $data
		*/
		public function render($data){
                    echo $data;
                }
                
                
                
	}