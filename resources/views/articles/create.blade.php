@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Escreva um novo Artigo</h1>
    <hr>
    
    {!! Form::open(['url' => 'articles']) !!}
    @include('articles.form', ['submitButtonText' => 'Inserir Artigo'])
    {!! Form::close() !!}
    
    @include('errors.list')
  </div>
@stop
