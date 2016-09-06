<?php

namespace app\Http\Controllers;

//use Carbon\Carbon;
use app\Http\Requests\ArticleRequest;

use app\Article;
use app\Tag;

Use Auth;

class ArticlesController extends Controller {


  /**
   * ArticlesController constructor.
   */
  public function __construct() {
    $this->middleware( 'auth' );
  }

  // lista os artigos
  public function index() {
    // $articles = Article::all();
    // $articles = Article::latest('published_at')->where('published_at','<=', Carbon::now())->get();
    $articles = Article::latest( 'published_at' )->published()->get();
    // $articles = Article::latest('published_at')->unpublished()->get();
    return view( 'articles.index', compact( 'articles' ) );
  }

  // exibe um artigo
  public function show( $id ) {
    $article = Article::findOrFail( $id );
    return view( 'articles.show', compact( 'article' ) );
  }

  // ver for de criar artigos
  public function create() {
    $tags = Tag::pluck( 'name', 'id' );
    return view( 'articles.create', compact( 'tags' ) );
  }

  // salva artigo
  public function store( ArticleRequest $request ) {
    // $input = Request::all();
    // Article::create( $input );

    // $article = new Article;
    // $article->title= $input['title'];
    // $article->body= $input['body'];

    // $article = new Article( $request->all() );
    // Auth::user()->articles()->save( $article );
    // flash()->overlay('corpo', 'titulo');

    $article = Auth::user()->articles()->create( $request->all() );
    dd($request->input( 'tags_list' ));
    $article->tags()->attach( $request->input( 'tags_list' ) );

    flash( 'Seu Artigo foi criado com sucesso!', 'success' );

    return redirect( 'articles' );
  }

  // editar um artigo
  public function edit( $id ) {
    $article = Article::findOrFail( $id );
    $tags = Tag::pluck( 'name', 'id' );

    return view( 'articles.edit', compact( 'article', 'tags' ) );
  }

  // post do editar
  public function update( $id, ArticleRequest $request ) {
    $article = Article::findOrFail( $id );
    $article->update( $request->all() );
    $article->tags()->sync( $request->input( 'tags_list' ) );
    return redirect( 'articles' );
  }
}
