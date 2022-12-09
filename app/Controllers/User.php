<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{

    public function index()
    {
		$user = new UserModel();
		$dados["usuarios"] = $user-> findAll();
        return view('users/index', $dados);
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
		session_destroy();
		return redirect()->to(base_url());
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
			var_dump($user);
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

	public function cadastro() {
		$user = new UserModel();
		$user-> cadastro();
	} // cadastrar
}
