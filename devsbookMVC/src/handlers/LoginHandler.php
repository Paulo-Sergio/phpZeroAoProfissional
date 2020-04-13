<?php
namespace src\handlers;

use src\models\User;

class LoginHandler {

  public static function checkLogin() {
    if (!empty($_SESSION['token'])) {
      $token = $_SESSION['token'];

      $data = User::select()->where('token', $token)->one();

      if (count($data) > 0) {
        $user = new User();
        $user->setId($data['id']);
        $user->setEmail($data['email']);
        $user->setName($data['name']);

        return $user;
      }
    }

    return false;
  }

  public static function verifyLogin($email, $password) {
    $user = User::select()->where('email', $email)->one();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $token = md5(time().rand(0,9999).time());
        
        // salvar o token no User
        User::update()
          ->set('token', $token)
          ->where('email', $email)
          ->execute();

        return $token;
      }
    }

    return false;
  }
 
}