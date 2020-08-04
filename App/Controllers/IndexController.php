<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		// se get login for um parametro existente na url, vou receber portanto ele então, se eke n existir, vou atribuir um parametro vazio
		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('index');

	}

	public function inscreverse() {

		$this->view->usuario = array( //valores default sempre que a view for utilizada
			'nome' => '',
			'email' => '',
			'senha' => '',
		);

		$this->view->erroCadastro = false;

		$this->render('inscreverse');
	}

	public function registrar(){

		// receber dados do formulario
		$usuario = Container::getModel('Usuario'); // método fazendo instancia de usuario com a comnexao com banco

		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', md5($_POST['senha']));

		if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) ==0) {			
			$usuario->salvar();
			$this->render('cadastro');
		}
		else {

			$this->view->usuario = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
			);

			$this->view->erroCadastro = true;

			$this->render('inscreverse');
		}
	} 
}


?>