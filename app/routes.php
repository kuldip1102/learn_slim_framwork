<?php 

$app->get('/home',function($request,$response){
	//return 'home';
	 return $this->view->render($response , 'home.twig');
});


?>