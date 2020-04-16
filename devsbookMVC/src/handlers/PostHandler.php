<?php
namespace src\handlers;

use src\models\Post;
use src\models\User;
use src\models\UserRelation;

class PostHandler {

  public static function addPost($idUser, $type, $body) {
    if (!empty($idUser) && !empty(trim($body))) {
      Post::insert([
        'id_user' => $idUser,
        'type' => $type,
        'created_at' => date('Y-m-d H:i:s'),
        'body' => $body
      ])->execute();
    }
  }

  public static function getHomeFeed($idUser) {
    // 1. pegar lista de usuarios que EU sigo (incluindo em mesmo);
    $userList = UserRelation::select()
      ->where('user_from', $idUser)
      ->get();
    $users = [];
    foreach ($userList as $userItem) {
      $users[] = $userItem['user_to'];
    }
    $users[] = $idUser;

    // 2. pegar os posts dessa galera ordenado pela data;
    $postList = Post::select()
      ->where('id_user', 'in', $users)
      ->orderBy('created_at', 'desc')
      ->get();

    // 3. transformar o resultado em objetos dos models;
    $posts = [];
    foreach ($postList as $postItem) {
      $post = new Post();
      $post->id = $postItem['id'];
      $post->type = $postItem['type'];
      $post->created_at = $postItem['created_at'];
      $post->body = $postItem['body'];
      $post->mine = false;
      if ($postItem['id_user'] == $idUser) {
        $post->mine = true; // post é meu?
      }

      // 4. preencher as informações adicionais no post;
      $user = User::select()
        ->where('id', $postItem['id_user'])
        ->one();
      $post->user = new User();
      $post->user->id = $user['id'];
      $post->user->name = $user['name'];
      $post->user->avatar = $user['avatar'];

      // 4.1 preencher informações de LIKE
      $post->likeCount = 0;
      $post->liked = false;

      // 4.2 preencher informações de COMMENTS
      $post->comments = [];

      $posts[] = $post;
    }
    
    // 5. retornar o resultado.
    return $posts;
  }
 
}