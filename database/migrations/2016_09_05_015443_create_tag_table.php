<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'tags', function ( Blueprint $table ) {
      $table->increments( 'id' );
      $table->string( 'name' );
      $table->timestamps();
    } );

    Schema::create( 'article_tag', function ( Blueprint $table ) {
      //$table->increments('arttagid');
      $table->integer( 'article_id' )->unsigned();
      $table->integer( 'tag_id' )->unsigned();

      $table->foreign( 'article_id' )
            ->references( 'id' )
            ->on( 'articles' )
            ->onDelete( 'cascade' );

      $table->foreign( 'tag_id' )
            ->references( 'id' )
            ->on( 'tags' )
            ->onDelete( 'cascade' );
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists( 'article_tag' );
    Schema::dropIfExists( 'tags' );
  }
}
