<?php
// Service 用テンプレ
// artisan で make できないので一旦コピペ
// 余裕があれば Command にできたらいいな
namespace App\Services;

use App\Models\Post;

class PostService
{
    public function get() {
        return (Post::get());
    }
}