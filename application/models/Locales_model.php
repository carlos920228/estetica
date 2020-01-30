<?php
class Locales_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	//Devuelve los locales activoss
	function get_locales(){
		$this->db->where('activo',1);
		$result= $this->db->get('locales');
		return $result;
		
	}
	function add($data){
		If(!$this->db->insert('locales',$data)){
			return $error = $this->db->error();
		}
	}
	
	function delete($id){
		$this->db->set('activo',0);
		$this->db->where('id',$id);
		$this->db->update('locales');
	}
	function get_local_detalle($id){
		$this->db->where('id',$id);
		$result= $this->db->get('locales');
		return $result->result();
		
	}
	function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('locales', $data);		
	}
}?>