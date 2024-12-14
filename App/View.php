<?php

namespace App;

use App\Models\GetTrait;
use App\Models\IssetTrait;
use App\Models\SetTrait;

/**
 * Class View
 * @package App
 *
 * @property array articles
 */

class View implements \Countable, \Iterator
{
    protected $data = [];
    private $position;

    use SetTrait, GetTrait, IssetTrait;

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    #[\ReturnTypeWillChange]
    public function count()
    {
        return count($this->data);
    }

    public function __construct()
    {
        $this->position = 0;
    }

    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->position = 0;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->data[$this->position];
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->position;
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        ++$this->position;
    }

    #[\ReturnTypeWillChange]
    public function valid()
    {
        return isset($this->data[$this->position]);
    }
}