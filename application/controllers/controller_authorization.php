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
                
                
                $tempContent = "";
                if(isset($params)){
                    $tempContent = $this->view->getContent('ErrorAuthorizationView.php');
                    $tempContent = $this->view->replace($tempContent, '{DATA}', Errors::getError('authorization', (int)$params[1]));
                }
                    
                $title = "Guestbook - Registration";
                $this->generatedContent = $this->view->generate('AuthorizationView.php', 'layout.php');
                $this->generatedContent = $this->view->replace($this->generatedContent, '{TITLE}', $title);
                $this->generatedContent = $this->view->replace($this->generatedContent, '{ERROR}', $tempContent);
                $this->view->render($this->generatedContent);
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
                
                if($resultCheckUser[0] && !isset($_SESSION)){
                    $_SESSION['authorization'] = true; 
                    $_SESSION['id_user'] = $resultCheckUser[1]; 
                }
                else 
                    $this->redirect(0, "/guestbook/authorization/index/error/4");                
                
            }
            
        }