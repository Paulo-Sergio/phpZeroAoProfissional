<?php
namespace src\models;
use \core\Model;

class UserRelation extends Model {

  public static function getTableName() {
    return self::$_h->table('user_relations');
  }
}