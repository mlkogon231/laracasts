@extends('app')
@section('content')
  <h1>Articles</h1><hr />
   @foreach ($articles as $article)
     <article>
       <h2>
         <a href = " {{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
       </h2>
       <div class = "body">{{ $article->body }}</div>
     </article>
   @endforeach
<h1><a href = " {{ url('/articles/create') }}">Create an Article</a><h1>
@stop
