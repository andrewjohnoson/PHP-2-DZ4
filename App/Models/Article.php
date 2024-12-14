<?php

namespace App\Models;

use App\Model;
use App\Db;

/**
 * @property string author
 */

class Article extends Model
{
    public const TABLE = 'news';

    public $id;
    public $title;
    public $content;
    public $author_id;

    /**
     * @return string имя автора, если таковое есть
     */

    public function __get($name)
    {
        if ('author' === $name) {
            if (!empty($this->author_id)) {
                $db = new Db();
                $query = 'SELECT EXISTS (SELECT id FROM authors WHERE id=:id);';
                if ($db->checkID($query, [':id' => $this->author_id])) {
                    return \App\Models\Author::findById($this->author_id);
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}