<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendBlogController
{
    public function detail($slug):Response{
        $blog = Blog::withTrashed()->where('slug', $slug)->first();
        $nextBlog = Blog::withTrashed()->whereNotIn('slug', [$slug])->where('is_active', '1')->limit(4)->orderByDesc('created_at')->get();
        return response()
            ->view("front.detail-blog", [
                "blog" => $blog,
                "nextBlog" => $nextBlog
            ]);
    }
}
