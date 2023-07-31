<?php

namespace App\Http\Controllers\Api\Blog;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ResponseAPI;
    public function index(){
        $blog = Blog::orderBy('created_at','DESC')->get();
        return $this->success(
            "Success!",
            $blog
        );
    }
}
