<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locales extends CI_Controller {
function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('Locales_model');
		$this->resultado="";
	}
	public function add(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Locales_model->add($_POST);
			redirect('Locales/verLocales');
		}else{
		$this->load->view('loginv2');
		}
	}
	public function deleteUser(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Locales_model->delete($_GET['id']);
			redirect('Locales/verLocales');
		}else{
		redirect('welcome');
		}
	}
	public function verLocales(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$test['locales']=$this->Locales_model->get_locales();
			$this->load->view('menu',$test);
			$this->load->view('locales/crudLocales',$test);
		}else{
		$this->load->view('loginv2');
		}
	}
	public function update(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$test['data']=$this->Locales_model->get_local_detalle($_GET['id']);
			$this->load->view('menu',$test);
			$this->load->view('locales/update',$test);
		}else{
		redirect('welcome');
		}
	}

	public function update_apply(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			print_r($_POST);
			$this->Locales_model->update($_POST['id'],$_POST);
			redirect('Locales/verLocales');
		}else{
		redirect('welcome');
		}
	}
	
	}