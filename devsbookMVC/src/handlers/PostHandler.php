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

  public static function getHomeFeed($idUser, $page) {
    $perPage = 2;

    // 1. pegar lista de usuarios que EU sigo (incluindo em mesmo);
    $userList = UserRelation::getTableName()->select()
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
      ->page($page, $perPage)
      ->get();

    $totalPosts = Post::select()
      ->where('id_user', 'in', $users)
      ->count();
    $pageCount = ceil($totalPosts / $perPage);

    // 3. transformar o resultado em objetos dos models;
    $posts = self::_postListToObject($postList, $idUser);
    
    // 5. retornar o resultado.
    return [
      'posts' => $posts,
      'pageCount' => $pageCount,
      'currentPage' => $page
    ];
  }

  public static function getUserFeed($idUser, $page, $loggedUserId) {
    $perPage = 2;

    // 2. pegar os posts desse usuário;
    $postList = Post::select()
      ->where('id_user', $idUser)
      ->orderBy('created_at', 'desc')
      ->page($page, $perPage)
      ->get();

    $totalPosts = Post::select()
      ->where('id_user', $idUser)
      ->count();
    $pageCount = ceil($totalPosts / $perPage);

    // 3. transformar o resultado em objetos dos models;
    $posts = self::_postListToObject($postList, $loggedUserId);
    
    // 5. retornar o resultado.
    return [
      'posts' => $posts,
      'pageCount' => $pageCount,
      'currentPage' => $page
    ];
  }

  public static function getPhotosFrom($idUser) {
    $photosData = Post::select()
      ->where('id_user', $idUser)
      ->where('type', 'photo')
      ->get();

    $photos = [];

    foreach ($photosData as $photo) {
      $post = new Post();
      $post->id = $photo['id'];
      $post->type = $photo['type'];
      $post->created_at = $photo['created_at'];
      $post->body = $photo['body'];

      $photos[] = $post;
    }

    return $photos;
  }

  private static function _postListToObject($postList, $loggedUserId) {
    $posts = [];
    foreach ($postList as $postItem) {
      $post = new Post();
      $post->id = $postItem['id'];
      $post->type = $postItem['type'];
      $post->created_at = $postItem['created_at'];
      $post->body = $postItem['body'];
      $post->mine = false;
      if ($postItem['id_user'] == $loggedUserId) {
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

    return $posts;
  }
 
}