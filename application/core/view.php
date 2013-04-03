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
            
            
            
                private $contentForRender = null;
            
		/**
		* Метод generate генерування виду
		* 
		* @param string $pContentView html вигляд для данного контенту
		* @param string $pTemplateView html загальний контент
		* @param string/int/array/boolean... $pData данi будь якого типу
		* @param string $title $pTitle даноi сторинки
		* @param string/int/array/boolean... $pOther данi будь якого типу
		*/
		public function generate($pContentView, $pTemplateView=null, $pOther=0){
		
			if($pOther != 0) $other		=	$pOther;
                        
                        $tempContent = $this->getContent($pTemplateView);
                        $this->contentForRender = $this->getContent($pContentView);
                        $this->contentForRender = $this->replace($tempContent, "{CONTENT}", $this->contentForRender);

                        return $this->contentForRender;
		}
                
                
                
                
                
                /**
		* Метод getContent
		* 
		* @param string $pNameCont
                * @return string
		*/
                public function getContent($pNameCont){
                    ob_start();
                    if($pNameCont != null) include 'application/views/'.$pNameCont;
                    $content = ob_get_contents();
                    ob_end_clean();
                    return $content;
                }
                
                
                
                /**
		* Метод generateCont
		* 
		* @param string $data
		*/
		public function generateCont($tamplate, array $repl){
                    $resultContent = $tamplate;

                    foreach($repl as $key => $value){
                        $resultContent = $this->replace($resultContent, $value[1], $value[0]);
                    }
                    
                    return $resultContent;
                }
                
                
                
                
                
                /**
		* Метод generateCont
		* 
		* @param string $data
		*/
		public function generateMultiCont($tamplate, array $repl){
                    $resultContent = null;
                    
                    ob_start();
                        include $tamplate;
                        $tample = ob_get_contents();
                    ob_end_clean();
                    
                    $temp2 = $tample;
                    
                    foreach($repl as $key => $value){
                        foreach($repl[$key] as $key2 => $value2){
                            $temp2 = $this->replace($temp2, $value2[1], $value2[0]);
                        }
                        $resultContent .= $temp2;
                        $temp2 = $tample;
                    }
                    
                    return $resultContent;
                }
                
                
                
                /**
		* Метод _replace
		* 
		* @param string $data
		*/
		public function replace($data, $search, $repl){
                    $resultContent = $data;
                    $resultContent = str_replace($search, $repl, $resultContent);

                    return $resultContent;
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