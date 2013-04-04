<?php
	/**
	* Controller_Main
	* 
	* Клас контроля головнои сторинки
	* 
	* @package application/controllers
	* @author Автор ... трололо
	* @version 1.0
	*/
	class ControllerMain extends Controller{
            
            
                private $generatedContent = null;
            
	
		/**
		* Конструктор __construct iнцiалiзуе обект view
		* 
		*/
		function __construct(){
			$this->view = new View();
                        $this->model = new ModelMain();
		}
		
		
		
		/**
		* Метод action_index генеруе дани для головнои сторинки
		* 
		* @param int $page сторiнка для вiдображення постiв по 10 шт
		*/
		public function actionIndex($page=1){	
			$posts = 0;
			if($page != 1) $posts = ($page-1) * 10;
			
			$numberElementsTable =  $this->model->getNumberElements();
	
			$data = $this->model->getAllInf($posts);
			arsort($data);
			$title	=	"Guestbook";
                        
                        
                        
			$this->generatedContent = $this->view->generate('MainView.php', 'layout.php');
                        $contRepl = $this->view->generateMultiCont("application/views/AllPostView.php", $data);
                        $this->generatedContent = $this->view->replace($this->generatedContent, '{ALL_POSTS}',$contRepl);
                        $this->generatedContent = $this->view->replace($this->generatedContent, '{TITLE}', $title);
                        $this->view->render($this->generatedContent);
		}
                
                
                
                
		/**
		* Метод actionAdd генерування сторинки добавлення постив
		* 
		*/
		public function actionAdd(){
			$namePost	=	"";

			if(!empty($_POST['name_user']) && !empty($_POST['text_user'])){
				$namePost	=	$_POST['name_user'];
				$textUser	=	$_POST['text_user'];
				$textShortUser	=	substr($textUser, 0, 30)."...";
				
				unset($_POST['name_user']);
				unset($_POST['text_user']);
				
				if($this->model->addInf($namePost, $textUser, $textShortUser, 'NOW()')) $data = "Entry is added to the database!"; else $data = "Entry is not added to the database!";
			}else{
				$data = "Entry is not added to the database!";
			}
			
			$title	=	"Guestbook - add post";
                        $this->generatedContent = $this->view->generate('AddView.php', 'layout.php');
                        $this->generatedContent = $this->view->replace($this->generatedContent, '{DATA}', $data);
                        $this->generatedContent = $this->view->replace($this->generatedContent, '{TITLE}', $title);
                        $this->view->render($this->generatedContent);
                        $this->redirect(1, '/guestbook/');
                        
                        
                        
                        
		}
                
                
		/**
		* Метод actionReadmore генерування сторинки для виведення повного тексту поста
		* 
		* @param int $pGets id поста для виведення
		*/
		public function actionReadmore(array $pGets){
                    $data = $this->model->getAboutIdInf($pGets[0]);
                    $title	=	"Guestbook - read more";
                    $this->generatedContent = $this->view->generate('ReadmoreView.php', 'layout.php');
                    $this->generatedContent = $this->view->generateCont($this->generatedContent, $data);
                    $this->generatedContent = $this->view->replace($this->generatedContent, '{TITLE}', $title);
                    $this->view->render($this->generatedContent);
		}
                
                
                
                
		/**
		* Метод actionEdit генерування сторинки для змiни данних
		* 
		* @param int $pGets id поста для редагування
		*/
		public function actionEdit(array $pGets){
                    $data = $this->model->getAboutIdInf($pGets[0]);

                    $title	=	"Guestbook - edit";

                    $this->generatedContent = $this->view->generate('EditView.php', 'layout.php');
                    $this->generatedContent = $this->view->replace($this->generatedContent, '{TITLE}', $title);
                    $this->generatedContent = $this->view->generateCont($this->generatedContent, $data);
                    $this->view->render($this->generatedContent);
                    
		}
                
                
		/**
		* Метод actionEditwrite генерування сторинки для запису змiни в базу
		* 
		*/
		public function actionEditwrite(){
			if(!empty($_POST['id']))			$id = $_POST['id'];
			if(!empty($_POST['name_user']))		$name = $_POST['name_user'];
			if(!empty($_POST['text_user']))		$text = $_POST['text_user'];
		
			$data = $this->model->updateDataAboutId($id, $name, $text);
			$title	=	"Guestbook - edit";
			
			if($data)
				$data = array(array("Update successful!", '{DATA}'));
			else
				$data = array(array("Update is not successful!", '{DATA}'));

			$this->generatedContent = $this->view->generate('EditRewriteView.php', 'layout.php');
                        $this->generatedContent = $this->view->generateCont($this->generatedContent, $data);
                        $this->generatedContent = $this->view->replace($this->generatedContent, '{TITLE}', $title);
                        $this->view->render($this->generatedContent);
                        $this->redirect(1, '/guestbook/');
		}
                
                
                
		/**
		* Метод actionDelete генерування сторинки видалення поста
		* 
		* @param int $pGets id поста для видалення
		*/
		public function actionDelete(array $pGets){
                    $data = $this->model->deleteData($pGets[0]);

                    if($data)
                            $data = array(array("Entry is delete from database!", '{DATA}'));
                    else
                            $data = array(array("Entry is not delete from database!", '{DATA}'));

                    $title	=	"Guestbook - delete";
                    
                    $this->generatedContent = $this->view->generate('DeleteView.php', 'layout.php');
                    $this->generatedContent = $this->view->generateCont($this->generatedContent, $data);
                    $this->generatedContent = $this->view->replace($this->generatedContent, '{TITLE}', $title);
                    $this->view->render($this->generatedContent);
                    $this->redirect(1, '/guestbook/');
		}
                
                
                
                
                

                
                
		/**
		* Метод action404 генерування сторинки 404
		* 
		*/
		public function action404(){
			$this->generatedContent = $this->view->generate('404View.php', 'layout.php', null);
                        $title = "404";
                        $this->generatedContent = $this->view->replace($this->generatedContent, '{TITLE}', $title);
                        $this->view->render($this->generatedContent);
		}
                
                
                
	}
