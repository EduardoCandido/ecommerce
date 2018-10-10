<?php

use \Hcode\Model;
use \Hcode\Model\User;
use \Hcode\PageAdmin;
use \Hcode\Model\Category;
use \Hcode\Mailer;


$app->get('/admin/users', function(){
	
	User::verifyLogin();
	$users = User::listAll();

	$page = new PageAdmin();
	$page->setTpl("users",array(
		"users"=>$users
	));
	exit;
});

$app->get('/admin/users/create', function(){
	
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("users-create");
	exit;
});

$app->get('/admin/users/:iduser/delete', function($iduser){
	User::verifyLogin();
	$user = new User();
	$user->get((int)$iduser);

	$user->delete();

	header("Location: /admin/users");
	exit;
});

$app->get('/admin/users/:iduser', function($iduser){
	
	User::verifyLogin();

	$user = new User();
	
	$user->get((int)$iduser);
	
	$page = new PageAdmin();
	
	$page ->setTpl("users-update", array(
        "user"=>$user->getValues()
    ));
	exit;
});

$app->post('/admin/users/create', function(){//Recebe os dados do template admin-users-create

	User::verifyLogin();

	$user = new User();
	
	$_POST['inadmin'] = (isset($_POST['inadmin']))?1:0;

	$_POST['despassword'] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [

		"cost"=>12

	]);

	
	$user->setData($_POST);
	
	$user->save();

	header("Location: /admin/users");
	exit;

});

$app->post('/admin/users/:iduser', function($iduser){
	
	User::verifyLogin();
	$user = new User();

	$user->get((int)$iduser);

	$_POST['inadmin'] = (isset($_POST['inadmin']))?1:0;

	$user->setData($_POST); //Passa os valores para as variaveis no model e assim reconhecer um usuário 

	$user->update(); //Altera os valores do Usuario no BD

	header("Location: /admin/users");
	exit;


});



?>