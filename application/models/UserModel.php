<?php
class UserModel extends CI_Model {

	public function checkUserEmail($usermail='')
	{
		$this->db->select('*');
        $this->db->where('user_email', $usermail);
        $this->db->from('test_subscribers');
        $query = $this->db->get();
        return $query->row_array(); 
	}
}