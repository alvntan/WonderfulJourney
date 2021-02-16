<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function create_article_page(){
        return view('article.create');
    }

    public function create(Request $req){
        
        if($req->hasFile('image')){
            if($req->file('image')->isValid()) {
                $validated = $req->validate([
                    "title" => "required|min:1|max:20",
                    "description" => "required|min:1|max:10000",
                    "image" => "required|mimes:png,jpeg|max:16000",
                ]);
                $extension = $req->image->extension();
                $req->file('image')->storeAs('public/images',$validated['title'] . "." . $extension);
                $url = Storage::url('images/') . $validated['title'] . "." . $extension;
                $article = Article::where([
                    'title' => $validated['title']
                ])->first();


                if($article != null) {
                    return back()->withErrors('Artikel yang kamu buat sudah ada');
                }

                $article = new Article();
                $article->title = $validated['title'];
                $article->description = $validated['description'];
                $article->image = $url;
                $article->save();
                return  back()->with('success', 'Artikel berhasil dibuat');
            }
            
        }
    }
    public function get() {
        $articles = Article::paginate(10);
        
        return view('article.blog', ['articles' => $articles]);
    }

    public function delete($id) {
        Article::where(['id' => $id])->delete();
        return back();
    }
}
