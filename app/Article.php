<?php

namespace app;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * app\Article
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property string $published_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $except
 * @method static \Illuminate\Database\Query\Builder|\app\Article whereId( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\Article whereTitle( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\Article whereBody( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\Article wherePublishedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\Article whereCreatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\Article whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\Article whereExcept( $value )
 * @mixin \Eloquent
 */
class Article extends Model {
  protected $fillable = [ 'title', 'body', 'published_at' ];


  public function sePublishedAtAttribute( $date ) {
    $this->attributes[ 'published_at' ] = Carbon::createFromFormat( 'Y-m-d', $date );
  }

  public function scopePublished( $query ) {
    $query->where( 'published_at', '<=', Carbon::now() );
  }

  public function scopeUnpublished( $query ) {
    $query->where( 'published_at', '>=', Carbon::now() );
  }

  /**
   * An Atile is owned by a user
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user() {
    return $this->belongsTo( User::class );
  }

  public function tags() {
    return $this->belongsToMany( Tag::class );
  }

  public function getTagsListAttribute() {
//    return $this->tags()->pluck('id')->all();
    return $this->tags()->get()->pluck("tagsid")->toArray();
//    return $this->tags()->lists('id')->all();
  }

}
