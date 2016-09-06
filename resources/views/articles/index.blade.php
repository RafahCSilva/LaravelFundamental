@extends('layouts.app')

@section('content')
  <div class="container">
    {{--@include('partials.alert')--}}
    @include('flash::message')
    <h1>Articles</h1>
    {!! Html::link('/articles/create','create new article') !!}
    <hr>
    
    @foreach($articles as $article)
      <h2>
        {{--<a href="/articles/{{$article->id}}">--}}
        <a href="{{ action('ArticlesController@show', [$article->id]) }}">
          {{$article->title}}
        </a>
      </h2>
      <div class="body">{{$article->body}}</div>
    @endforeach
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $( 'div.alert' ).not( '.alert-important' ).delay( 3000 ).slideUp( 300 );
    $('#flash-overlay-modal').modal();
  </script>
@stop

