<?php

class common_model extends CI_Model {

	public function db_operation_add_data($table_name ,$data){
        $this->db->trans_complete();
        $this->db->trans_start();
        $this->db->insert($table_name,$data);
        $id=$this->db->insert_id();
        $this->db->trans_complete();
		// echo $this->db->last_query();
        return $id; 
	}  


	public function db_delete_data($table,$column='',$id=''){
		$this->db->where($column, $id);
		$this->db->delete($table);
		return true;
	}
	
}