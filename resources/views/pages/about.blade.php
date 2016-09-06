@extends('app')

@section('content')
  <h1>About Me: {{$name}}</h1>
  
  @if(count($pessoas))
    <h3>lista:</h3>
    <ul>
      @foreach($pessoas as $pessoa)
        <li>{{$pessoa}}</li>
      @endforeach
    </ul>
  @endif
  
  <p>
    bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
    bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
    bla bla bla bla bla bla bla bla bla bla bla bla </p>

@stop
