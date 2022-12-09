<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table ="user";
    protected $returnType ="array";

    public function select($cols,$where){
		return $this->db->select("user", $cols, $where);
	}
	public function cadastro(){
	  	$db = db_connect();
		$name = $_POST["name"];
      	$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$type = $_POST["type"];
      	$sql = "INSERT INTO `user` (`name`, `email`, `password`, `type`) VALUES ('$name', '$email', '$password', '$type')";
      	$db->query($sql);
	}
	
}