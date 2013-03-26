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
	
                private $buffer     = null;
	
		/**
		* Конструктор __construct iнцiалiзуе обект view
		* 
		*/
		function __construct(){
			$this->view = new View();
		}
		
		
		
		/**
		* Метод action_index генеруе дани для головнои сторинки
		* 
		* @param int $page сторiнка для вiдображення постiв по 10 шт
		*/
		function actionIndex($page=1){	
                        $this->model = new ModelMain();
			$posts = 0;
			if($page != 1) $posts = ($page-1) * 10;
			
			$numberElementsTable =  $this->model->getNumberElements();
	
			$data = $this->model->getData($posts);
			arsort($data);
			$title	=	"Guestbook";
			$this->view->generate('MainView.php', 'layout.php', $data, $title, $numberElementsTable);
		}
                
                
                
		/**
		* Метод actionAdd генерування сторинки добавлення постив
		* 
		*/
		public function actionAdd(){
			$this->model = new ModelMain();
			$namePost	=	"";

			if(!empty($_POST['name_user']) && !empty($_POST['text_user'])){
				$namePost	=	$_POST['name_user'];
				$textUser	=	$_POST['text_user'];
				$textShortUser	=	substr($textUser, 0, 30)."...";
				
				unset($_POST['name_user']);
				unset($_POST['text_user']);
				
				if($this->model->addPost($namePost, $textUser, $textShortUser)) $data = "Entry is added to the database!"; else $data = "Entry is not added to the database!";
			}else{
				$data = "Entry is not added to the database!";
			}
			
			$title	=	"Guestbook - add post";
			
			$this->view->generate('AddView.php', 'layout.php', $data, $title);
                        
                        header('Refresh: 1; URL=/guestbook/');
		}
                
                
		/**
		* Метод actionReadmore генерування сторинки для виведення повного тексту поста
		* 
		* @param int $pGets id поста для виведення
		*/
		public function actionReadmore($pGets){
                    $this->model = new ModelMain();
                    $data = $this->model->getDataReadmore($pGets);
                    $title	=	"Guestbook - read more";
                    $this->view->generate('ReadmoreView.php', 'layout.php', $data, $title);
		}
                
                
                
                
		/**
		* Метод actionEdit генерування сторинки для змiни данних
		* 
		* @param int $pGets id поста для редагування
		*/
		function actionEdit($pGets){
                    $this->model = new ModelMain();
                    $data = $this->model->getDataEdit($pGets);

                    $title	=	"Guestbook - edit";

                    $this->view->generate('EditView.php', 'layout.php', $data, $title);
                    
		}
                
                
		/**
		* Метод actionEditwrite генерування сторинки для запису змiни в базу
		* 
		*/
		function actionEditwrite(){
			$this->model = new ModelMain();
			if(!empty($_POST['id']))			$id = $_POST['id'];
			if(!empty($_POST['name_user']))		$name = $_POST['name_user'];
			if(!empty($_POST['text_user']))		$text = $_POST['text_user'];
		
			$data = $this->model->updateDataEdit($id, $name, $text);
			$title	=	"Guestbook - edit";
			
			if($data)
				$data = "Update successful!";
			else
				$data = "Update is not successful!";

			$this->view->generate('EditRewriteView.php', 'layout.php', $data, $title);
                        
                        header('Refresh: 1; URL=/guestbook/');
		}
                
                
                
		/**
		* Метод actionDelete генерування сторинки видалення поста
		* 
		* @param int $pGets id поста для видалення
		*/
		public function actionDelete($pGets){
                    $this->model = new ModelMain();
                    $data = $this->model->deleteData($pGets);

                    if($data)
                            $data = "Entry is delete from database!";
                    else
                            $data = "Entry is not delete from database!";

                    $title	=	"Guestbook - delete";
                    $this->view->generate('DeleteView.php', 'layout.php', $data, $title);
                    header('Refresh: 1; URL=/guestbook/');
		}
                
                
                
                
                

                
                
		/**
		* Метод action404 генерування сторинки 404
		* 
		*/
		function action404(){
			$this->view->generate('404View.php', 'layout.php', null, "404");
		}
                
                
                
	}
