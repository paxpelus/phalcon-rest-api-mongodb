<?php

use Phalcon\Mvc\Collection;

class Posts extends Collection
{
    public function getSource()
    {
        return "posts";
    }
}