<?php

use \Hcode\Model;
use \Hcode\Model\User;
use \Hcode\PageAdmin;
use \Hcode\Page;
use \Hcode\Mailer;

$app->get('/', function() {
	
	$page = new Page();
	$page->setTpl("index");
	
});



?>