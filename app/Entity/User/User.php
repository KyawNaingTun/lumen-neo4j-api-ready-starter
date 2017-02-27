<?php

namespace App\Entity\User;

use App\Entity\Base\Model;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Entrust\Traits\EntrustUserTrait;

class User extends Model implements
      AuthenticatableContract,
      AuthorizableContract,
      JWTSubject
  {
    use Authenticatable, Authorizable, EntrustUserTrait {
              EntrustUserTrait::can insteadof Authorizable;
          }

    protected $table = 'Users';//define neo label
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
     * [getJWTIdentifier description]
     * @return [type] [description]
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * [getJWTCustomClaims description]
     * @return [type] [description]
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
     * [roles description]
     * @return [type] [description]
     */
    public function roles()
    {
        return $this->belongsToMany('App\Entity\Role\Role', 'ROLE');
    }
}
