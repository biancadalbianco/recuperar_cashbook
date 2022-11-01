<?php

namespace App\Controllers;

class User extends BaseController
{

    public function index()
    {
        return view('users/index');
    }

    public function login()
    {
        // Título da página
		$this->title = 'Login';
		/** Carrega os arquivos do view **/
		//require VIEW . '/user/login.php';
        return view('users/login');
    }

    public function logout() {
		$this->unsetUser();
		$msg['class']="success";
		$msg['msg']="By";
		$_SESSION['msg'][]=$msg;
		header("Refresh: 2; url =".base_url());
    } 

    public function auth() {
		
		if(isset($_POST['user']['send_login'])){
			
			$userModel=$this->load_model("user");
			$cols[]='id';
			$cols[]='name';
			$cols[]='email';

			$where['email']=$_POST['user']['email'];
			$where['password']=md5($_POST['user']['password']);
			
			$user=$userModel->select($cols,$where);
			
			if($user){
				$this->setUser($user[0]);
				$msg['class']="success";
				$msg['msg']="Login realizado com sucesso!";
			}else{
				$msg['class']="danger";
				$msg['msg']="Falha ao realizar login!";
			}
			$_SESSION['msg'][]=$msg;
			
		}
		header("Refresh: 2; url =".base_url());
	} // autenticar
}
