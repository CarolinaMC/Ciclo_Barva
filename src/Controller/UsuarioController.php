<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuario Controller
 *
 */
class UsuarioController extends AppController
{

	public function login(){
        if($this->request->is('post')){
            $usuario=$this->Auth->identify();
            if($usuario){
                $this->Auth->setUser($usuario);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                $this->Flash->error('Datos son incorrectos', ['key'=>'auth']);
            }

        }


    }
    
	public function index()
	{
		echo"Listado de usuarios";
		exit();
	}

	public function home()
	{
		$this->render();
	}
}
