<?php
namespace src\handlers;

use src\models\User;
use src\models\UserRelation;

class UserHandler {

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

  public static function idExists($id) {
    $user = User::select()->where('id', $id)->one();
    return $user ? true : false;
  }

  public static function getUser($id, $full = false) {
    $data = User::select()
      ->where('id', $id)
      ->one();

    if ($data) {
      $user = new User();
      $user->id = $data['id'];
      $user->name = $data['name'];
      $user->birthdate = $data['birthdate'];
      $user->city = $data['city'];
      $user->work = $data['work'];
      $user->avatar = $data['avatar'];
      $user->cover = $data['cover'];

      if ($full) {
        $user->followers = [];
        $user->followings = [];
        $user->photos = [];

        // followers (seguidores -> quem me segue)
        $followers = UserRelation::getTableName()->select()
          ->where('user_to', $id)
          ->get();

        foreach ($followers as $follower) {
          $userData = User::select()
            ->where('id', $follower['user_from'])
            ->one();
          $newUser = new User();
          $newUser->id = $userData['id'];
          $newUser->name = $userData['name'];
          $newUser->avatar = $userData['avatar'];

          $user->followers[] = $newUser;
        }

        // following (seguindo -> quem eu sigo)
        $followings = UserRelation::getTableName()->select()
          ->where('user_from', $id)
          ->get();

        foreach ($followings as $following) {
          $userData = User::select()
            ->where('id', $following['user_to'])
            ->one();
          $newUser = new User();
          $newUser->id = $userData['id'];
          $newUser->name = $userData['name'];
          $newUser->avatar = $userData['avatar'];

          $user->followings[] = $newUser;
        }

        // photos
        $user->photos = PostHandler::getPhotosFrom($id);

      }

      return $user;
    }

    return false;
  }

  public static function isFollowing($fromId, $toId) {
    $data = UserRelation::getTableName()->select()
      ->where('user_from', $fromId)
      ->where('user_to', $toId)
      ->one();

    return $data ? true : false;
  }

  public static function follow($fromId, $toId) {
    UserRelation::getTableName()->insert([
      'user_from' => $fromId,
      'user_to' => $toId
    ])->execute();
  }

  public static function unfollow($fromId, $toId) {
    UserRelation::getTableName()->delete()
      ->where('user_from', $fromId)
      ->where('user_to', $toId)
      ->execute();
  }

  public static function searchUser($term) {
    $users = [];
    $data = User::select()
      ->where('name', 'like', '%' . $term . '%')
      ->get();

    if ($data) {
      foreach ($data as $user) {
        $u = new User();
        $u->id = $user['id'];
        $u->name = $user['name'];
        $u->avatar = $user['avatar'];

        $users[] = $u;
      }
    }

    return $users;
  }
 
}