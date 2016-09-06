<div class="form-group">
  {!! Form::label('title', 'Title:') !!}
  {!! Form::text('title', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('body', 'Body:') !!}
  {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('published_at', 'Publicado em:') !!}
  {!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('tags_list', 'Tags:') !!}
  {!! Form::select('tags_list[]', $tags, (isset($article) ? $article->tags()->pluck( 'id' )->toArray() : null), ['class'=> 'form-control', 'multiple', 'id'=>'tag_list']) !!}
</div>
<div class="form-group">
  {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
<script src="//code.jquery.com/jquery.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $( '#tag_list' ).select2( {
    placeholder: 'Escolha uma tag',
    tags: true
  } );
</script>