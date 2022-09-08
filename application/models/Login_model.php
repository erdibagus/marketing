<?php
class Login_model extends ci_model{

	public function cek_login($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

}
