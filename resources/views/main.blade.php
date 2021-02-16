@extends('layout.master')

@section('body')
<div class="article-list-container">
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-3">
                <a href="{{ route('get_article', ['id'=>$article->id]) }}" class="text-dark"
                    style="text-decoration: none;">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset($article->img_path)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="text-decoration-none card-title">
                                {{$article->title}}
                            </h5>
                            <p class="card-text">{{$article->description}}</p>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
