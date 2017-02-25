<?php

namespace Twit\Controller;

use App\Controller\AppController as BaseController;
use Cake\View\Helper\SessionHelper ;

class AppController extends BaseController
{

	function initialize()
	{
		parent::initialize();
	}
	
	function beforeFilter(){
		$user = $this->request->session()->read('Auth.User');
		$this->set('username', $user['username']);
		print_r($user);
	}
}
