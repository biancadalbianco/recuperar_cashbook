<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function select($cols,$where){
		return $this->db->select("user", $cols, $where);
	}
}