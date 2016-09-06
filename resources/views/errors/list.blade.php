@if($errors->any())
  <ul class="alert alert-danger">
    @foreach($errors->all() as $erro)
      <li>{{ $erro }}</li>
    @endforeach
  </ul>


  <pre>
  {{ var_dump($errors) }}
  </pre>
@endif
