<?php
class User_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}

	function login($username, $password){
		$this->db->where('usuario', $username);
		$this->db->where('password', $password);
		$this->db->where('activo',1);
		$result= $this->db->get('usuarios');
		if($result->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function data($username){
		$this->db->where('usuario', $username);
		$result= $this->db->get('usuarios');
		return $result->result();
		
	}
	function get_user(){
		$result= $this->db->query("SELECT usuarios.id,usuarios.nombre,usuarios.telefono,usuarios.usuario, locales.direccion
FROM estetica.usuarios, estetica.locales where usuarios.activo='1' and usuarios.locales_id=locales.id");
		return $result;
		
	}
	function get_user_data($id){
		$result= $this->db->query("SELECT usuarios.id,usuarios.password,usuarios.nombre,usuarios.telefono,usuarios.usuario, usuarios.locales_id, locales.direccion, usuarios.rol
FROM estetica.usuarios, estetica.locales where usuarios.id=$id and usuarios.locales_id=locales.id");
		return $result->result();
		
	}
	function add_user($data){
		If(!$this->db->insert('usuarios',$data)){
			return $error = $this->db->error();
			}
	}
	function delete_user($id){
		$this->db->set('activo',0);
		$this->db->where('id',$id);
		$this->db->update('usuarios');
	}
	function update($id,$data){
		echo $id;
		$this->db->where('id',$id);
		$this->db->update('usuarios', $data);		
	}
}?>