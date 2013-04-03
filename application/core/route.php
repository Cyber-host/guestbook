<?php
	/**
	* Route
	* 
	* Клас для вибору потрибних класiв
	* 
	* @package application/core
	* @author Автор ... трололо
	* @version 1.0
	*/

	class Route{
		/**
		* Метод start запуск ядра сайта
		* 
		*/
		static function start(){
    
                        $routes = Route::_getActions($_SERVER['REQUEST_URI']);
                        
                        if(!empty($routes['params']))
                            $routes['controller']->$routes['action']($routes['params']);
                        else
                            $routes['controller']->$routes['action']();
                        
		}
                
                
                
                
                private function _getActions($pUrl){
                   
                    $actions            = array(); 
                    $flagInclude        = false;
                    
                    
                    preg_match_all("/\/([a-z0-9]+)/", $pUrl, $aRess);
                    
                    
                    
                    if(empty($aRess[1][1]) || empty($aRess[1][2])) {$actions['controller'] = "main"; $actions['action'] = "index";}; //return Route::error($flagInclude);};
                    
                    foreach($aRess[1] as $key => $value){
                        switch($key){
                            case 0: break;
                            case 1: if(!empty($value)){ $actions['controller']  = $value; break;}    else    {return Route::error($flagInclude);}; 
                            case 2: if(!empty($value)){ $actions['action']      = $value; break;}    else    {return Route::error($flagInclude);};
                            default: $actions['params'][] = $value;
                        }
                    }
                    
                    
                    $fileNameController     = "controller_".$actions['controller'];
                    $fileNameModel          = "model_".$actions['controller'];
                    
                    $patchToController      = "application/controllers/".$fileNameController.".php";
                    $patchToModel           = "application/models/".$fileNameModel.".php";
                    
                    $classController        = "Controller".ucfirst($actions['controller']);
                    
                    $methodAction           = "action".ucfirst($actions['action']);
                    
                    
                    
                    if(!file_exists($patchToModel)){         return Route::error($flagInclude); }  else    include($patchToModel);
                    if(!file_exists($patchToController)){    return Route::error($flagInclude); }  else    include($patchToController);
                    $flagInclude = true;
                    
                    $actions['controller'] = new $classController;
                    
                    
                    
                    if(!method_exists($actions['controller'], $methodAction)){ return Route::error($flagInclude);};
                    
                    $actions['action'] = $methodAction;
                    
                    return $actions;
                }
                
                
                
                private function error($pIncl){
                    if(!$pIncl){
                        $controllerError    = "application/controllers/controller_main.php";
                        include($controllerError); 
                    }
                    $error = array("controller" => new ControllerMain(), "action" => "action404");
                    return $error;
                }
                

    
	}

