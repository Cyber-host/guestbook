<?php
	/**
	* ControllerRegistration
	* 
	* Клас контроля сторинки регистрации
	* 
	* @package application/controllers
	* @author Автор ... трололо
	* @version 1.0
	*/
        class ControllerRegistration extends Controller{
            
            /**
            * Конструктор __construct iнцiалiзуе обект view
            * 
            */
            function __construct(){
                $this->model = new ModelRegistration();
                $this->view = new View();
            }
            
            
            
            
            
            /**
            * Метод actionIndex
            * 
            * @param array
            */
            public function actionIndex(array $params=null) {
                $title = "Guestbook - Registration";
                $tempContent = "";
                if(isset($params)){
                    $tempContent =  $this->view->generate('ErrorRegistrationView', array(Errors::getError('registration', (int)$params[1])), false);
                }
                $this->view->render($this->view->generate('RegistrationView', array($tempContent, 'title' => $title)));
            }
            
            
            
            
            
            
            /**
            * Метод actionPost
            * 
            */
            public function actionPost() {
                
                $login      = trim($_POST['login']);
                $paswrd     = trim($_POST['paswrd']);
                $repaswrd   = trim($_POST['repaswrd']);
                
                unset($_POST['login']); unset($_POST['paswrd']); unset($_POST['repaswrd']);
                
                if(!isset($login) || empty($login) || !preg_match('/^[a-zA-Z][-_a-zA-Z0-9]{4,25}$/', $login)){
                    $this->redirect(0, "/guestbook/registration/index/error/1");
                }

                
                if(!isset($paswrd) || empty($paswrd) || $paswrd != $repaswrd || !preg_match('/^[a-zA-Z0-9-_]{6,25}$/', $paswrd)){
                    $this->redirect(0, "/guestbook/registration/index/error/2");
                }
                
                if($this->model->checkUser($login))
                    $this->redirect(0, "/guestbook/registration/index/error/3");
                
                
                $result = $this->model->actionAddNewUser($login, md5(md5($paswrd)));
                if($result){

                    $title = "Guestbook - Registration";
                    $data = "Registration is successful!";
                    $this->view->render($this->view->generate('RegistrationDoneView', array($data, 'title'=>$title)));
                    $this->redirect(1, "/guestbook/");
                }else
                    $this->redirect(0, "/guestbook/registration/index/error/4");
                    
            }
            
        }
