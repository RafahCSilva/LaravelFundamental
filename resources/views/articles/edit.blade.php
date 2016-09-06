@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Editando um Artigo</h1>
    <hr>
    
    {!! Form::model($article, [ 'method'=>'PATCH', 'action'=>['ArticlesController@update', $article->id]]) !!}
    @include('articles.form', ['submitButtonText' => 'Update Artigo'])
    {!! Form::close() !!}
    
    @include('errors.list')
  </div>
@stop
