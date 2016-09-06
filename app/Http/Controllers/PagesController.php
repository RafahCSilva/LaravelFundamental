<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;

class PagesController extends Controller {

  public function about() {
    $name = 'RaFao';
    $pessoas = [ 'aaaaa', 'bbbbb', 'ccccc' ];
    return view( 'pages.about', compact( 'name', 'pessoas' ) );
  }

  public function contact() {
    return view( 'pages.contact' );
  }

}
