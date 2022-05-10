<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\PostInterface;

class PostController extends Controller
{
    public function index()
    {
        $posts = app(PostInterface::class);
        return ($posts->get());
    }
}
