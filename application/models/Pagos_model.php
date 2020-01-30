<?php
class Pagos_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	//Devuelve los locales activoss
	function get(){
		$this->db->where('activo',1);
		$result= $this->db->get('pagos');
		return $result;
		
	}
	function add($data){
		If(!$this->db->insert('pagos',$data)){
			return $error = $this->db->error();
		}
	}
	
	function delete($id){
		$this->db->set('activo',0);
		$this->db->where('idpagos',$id);
		$this->db->update('pagos');
	}
	function get_detalle($id){
		$this->db->where('idpagos',$id);
		$result= $this->db->get('pagos');
		return $result->result();
		
	}
	function update($id,$data){
		$this->db->where('idpagos',$id);
		$this->db->update('pagos', $data);		
	}
}?>