<?php
class Estruc_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	function add_estructura($data){
		If(!$this->db->insert('estructuras',$data)){
			return $error = $this->db->error();
			}
	}

	function get_estructuras(){
		$this->db->where('estado',1);
		$result= $this->db->get('estructuras');
		return $result;
		
	}
	
	function delete_estruc($id){
		$this->db->set('estado',0);
		$this->db->where('idestructuras',$id);
		$this->db->update('estructuras');
	}

	function get_detalle($id){
		$this->db->where('idestructuras',$id);
		$result= $this->db->get('estructuras');
		return $result->result();
		
	}
	function update_estruc($id,$data){
		$this->db->where('idestructuras',$id);
		$this->db->update('estructuras', $data);		
	}	
}?>