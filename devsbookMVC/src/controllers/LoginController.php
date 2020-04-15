<?php

namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller {

  public function signin() {
    $flash = '';
    if (!empty($_SESSION['flash'])) {
      $flash = $_SESSION['flash'];
      $_SESSION['flash'] = '';
    }

    $this->render('signin', [
      'flash' => $flash
    ]);
  }

  public function signinAction() {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    if ($email & $password) {
      
      $token = LoginHandler::verifyLogin($email, $password);
      if ($token) {
        $_SESSION['token'] = $token;
        $this->redirect('/');
      } else {
        $_SESSION['flash'] = 'E-mail e/ou senha não conferem.';
        $this->redirect('/login');
      }

    }
    $_SESSION['flash'] = 'Digite os campos de e-mail e/ou senha';
    $this->redirect('/login');
  }

  public function signup() {
    $flash = '';
    if (!empty($_SESSION['flash'])) {
      $flash = $_SESSION['flash'];
      $_SESSION['flash'] = '';
    }

    $this->render('signup', [
      'flash' => $flash
    ]);
  }

  public function signupAction() {
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $birthdate = filter_input(INPUT_POST, 'birthdate');

    if ($name && $email && $password && $birthdate) {

      $birthdate = explode('/', $birthdate);
      if (count($birthdate) != 3) {
        $_SESSION['flash'] = 'Data de nascimento inválida!';
        $this->redirect('/cadastro');
      }

      $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
      if (!strtotime($birthdate)) {
        $_SESSION['flash'] = 'Data de nascimento inválida!';
        $this->redirect('/cadastro');
      }

      if (LoginHandler::emailExists($email)) {
        $_SESSION['flash'] = 'E-mail já cadastrado!';
        $this->redirect('/cadastro');
      } else {
        $token = LoginHandler::addUser($name, $email, $password, $birthdate);
        $_SESSION['token'] = $token;
        $this->redirect('/');
      }
    }

    $_SESSION['flash'] = 'Campo obrigatórios';
    $this->redirect('/cadastro');
  }
}
