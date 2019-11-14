<?php 

/**
 * 
 */
class Home extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		session_start();
	}

	function render(){

 			$this->view->render('home/home');
 				
	}


	function registrar(){
$this->view->render('indigenas/registrar');


	}
}

 ?>




	

	
	

	
	
	


