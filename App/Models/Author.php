<?php

namespace App\Models;

use App\Model;
use App\Db;

class Author extends Model
{
    public const TABLE = 'authors';

    public $id;
    public $author_name;

    /**
     * @param int $id ID автора новости, если он был в author_id записи объекта Article
     * @return string возвращает имя автора, если он есть
     */

    public static function findById($id)
    {
        $db = new Db();
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        return $db->query($query, static::class, [':id' => $id])[0]->author_name;
    }
}