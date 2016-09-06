@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{$article->title}}</h1>
    <span>{{$article->published_at}}</span>
    <article>{{$article->body}}</article>
    
    @unless($article->tags->isEmpty())
      <h5>Tags:</h5>
      <ul>
        @foreach($article->tags as $tag)
          <li>{{$tag->name}}</li>
        @endforeach
      </ul>
    @endunless
    {{ Html::link('articles/'.$article->id.'/edit', 'Editar') }}
  </div>
@stop



