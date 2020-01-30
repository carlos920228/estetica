<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('Prov_model');
		$this->load->model('Estruc_model');
		$this->load->model('Solicitud_model');
		$this->load->model('Locales_model');
		$this->resultado="";
	}
	public function entrar(){
		
			
	}
	public function update(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$test['data']=$this->User_model->get_user_data($_GET['id']);
			$test['locales']=$this->Locales_model->get_locales();
			$this->load->view('menu',$test);
			$this->load->view('user/update',$test);
		}else{
		redirect('welcome');
		}
	}

	public function update_apply(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			print_r($_POST);
			$this->User_model->update($_POST['id'],$_POST);
			redirect('welcome/verUsuarios');
		}else{
		redirect('welcome');
		}
	}
	
	}


