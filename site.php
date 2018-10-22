<?php

use \Hcode\Model;
use \Hcode\Model\User;
use \Hcode\PageAdmin;
use \Hcode\Page;
use \Hcode\Mailer;
use \Hcode\Model\Product;

$app->get('/', function() {
	
	$products = Product::listAll();
	
	$page = new Page();
	$page->setTpl("index",[
		'products'=>Product::checkList($products)
	]);
	
});


$app->get('/categories/:idcategory',function($idcategory){
	
	$category = new Category();
	$category->get((int)$idcategory);
	
	$page = new Page();

	$page->setTpl('category',[
		'category'=>$category->getValues(),
		'products'=>[]
	]);
});





?>