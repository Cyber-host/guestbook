<?php
	/**
	* ControllerAuthorization
	* 
	* Клас контроля сторинки регистрации
	* 
	* @package application/controllers
	* @author Автор ... трололо
	* @version 1.0
	*/
        class ControllerAuthorization extends Controller{
            
            
            /**
            * Конструктор __construct iнцiалiзуе обект view
            * 
            */
            function __construct(){
                $this->model = new ModelAuthorization();
                $this->view = new View();
            }
            
            
            /**
            * Метод actionIndex
            * 
            * @param array
            */
            public function actionIndex(array $params=null) {
                $title = "Guestbook - Authorization";
                $tempContent = "";
                if(isset($params)){
                    $tempContent =  $this->view->generate('ErrorAuthorizationView', array(Errors::getError('authorization', (int)$params[1])), false);
                }
                $this->view->render($this->view->generate('AuthorizationView', array($tempContent, 'title' => $title)));
            }
            
            
            /**
            * Метод actionPost
            * 
            * @param array
            */
            public function actionPost(){
                
                
                $login      = trim($_POST['login']);
                $paswrd     = trim($_POST['paswrd']);
                
                
                if(!isset($login) || empty($login)){
                    $this->redirect(0, "/guestbook/authorization/index/error/1");
                    
                }
                
                if(!isset($paswrd) || empty($paswrd)){
                    $this->redirect(0, "/guestbook/authorization/index/error/2");
                }
                
                $resultCheckUser = $this->model->checkUser($login, $paswrd);
                
                if($resultCheckUser[0]){
                    
                    Session::init();
                    Session::set('authorization', true);
                    Session::set('id_user', $resultCheckUser[1]);
                    Session::set('name_user', $resultCheckUser[2]);
                    $this->redirect(0, "/guestbook/");
                }else 
                    $this->redirect(0, "/guestbook/authorization/index/error/4");                
                
            }
            
            
            /**
            * Метод actionExit
            * 
            * @param array
            */
            public function actionExit(){
                Session::init();
                Session::close();
                $this->redirect(0, "/guestbook/");
            }
            
        }