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
        $user->id = $data['id'];
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->avatar = $data['avatar'];


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

  public static function emailExists($email) {
    $user = User::select()->where('email', $email)->one();
    return $user ? true : false;
  }

  public static function addUser($name, $email, $password, $birthdate) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $token = md5(time().rand(0,9999).time());

    User::insert([
      'email' => $email,
      'password' => $hash,
      'name' => $name,
      'birthdate' => $birthdate,
      'token' => $token
    ])->execute();

    return $token;
  }
 
}