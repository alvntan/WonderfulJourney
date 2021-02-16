<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $articles = Article::paginate(9);
        return view('main', ['articles' => $articles]);
    }
}
