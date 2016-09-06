<?php

namespace app;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * app\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\app\User whereId( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\User whereName( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\User whereEmail( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\User wherePassword( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\User whereRememberToken( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\User whereCreatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\app\User whereUpdatedAt( $value )
 */
class User extends Authenticatable {
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];


  /**
   * A use can hae a many articles
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function articles() {
    return $this->hasMany( Article::class );
  }
}
