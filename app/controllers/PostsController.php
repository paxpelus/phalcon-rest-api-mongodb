<?php

use Phalcon\Mvc\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::find();
        
        return Rs::p(1,'All Posts',$posts);
    }

    public function show($slug)
    {
        return Rs::p(1,'Show Post',$slug);
    }
}