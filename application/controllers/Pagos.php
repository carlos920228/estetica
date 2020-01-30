<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller {
function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('Pagos_model');
		$this->resultado="";
	}
	public function add(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Pagos_model->add($_POST);
			redirect('Pagos/verPagos');
		}else{
		$this->load->view('loginv2');
		}
	}
	public function delete(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Pagos_model->delete($_GET['id']);
			redirect('Pagos/verPagos');
		}else{
		redirect('welcome');
		}
	}
	public function verPagos(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$test['pagos']=$this->Pagos_model->get();
			$this->load->view('menu',$test);
			$this->load->view('pagos/crudPagos',$test);
		}else{
		$this->load->view('loginv2');
		}
	}
	public function update(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$test['data']=$this->Pagos_model->get_detalle($_GET['id']);
			$this->load->view('menu',$test);
			$this->load->view('pagos/updatePago',$test);
		}else{
		redirect('welcome');
		}
	}

	public function update_apply(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			print_r($_POST);
			$this->Pagos_model->update($_POST['idpagos'],$_POST);
			redirect('Pagos/verPagos');
		}else{
		redirect('welcome');
		}
	}
	
	}