<?php
	/**
	* 
	*/
	class StaffController extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function __initPage(){
			if(Session::get('staff') == false){
				url::redirect('admin/login');
			}
			$data['title'] = Staff Management;
			$this->view->rendertemplate('header',$data);
			$this->view->render('admin/admin',$data);
			$this->view->rendertemplate('footer',$data);
		}

		public function login(){
			if(Session::get('staff')==true){
				url::redirect('admin');
			}
			if(isset($_POST['submit'])){
				$username = $_POST['username'];
				$password = $_POST['password'];

				$admin = $this->loadModel('admin_model'); 
			}
		}
	}
?>