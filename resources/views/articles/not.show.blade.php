@extends('app')
@section('content')
  <h1> {{ $article->title }} </h1>     <hr />

  <article>
    <h2>
      <a href = "{{ action('ArticlesController@show', [$article->id]) }}"> {{ $article->body }} </a>
    </h2>
  </article>


@stop
