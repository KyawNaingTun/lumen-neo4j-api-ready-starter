<?php

namespace App\Entity\Role;

use App\Entity\Base\Model;

use App\Entrust\EntrustRole;

class Role extends EntrustRole
  {

    protected $table = 'roles';//define neo label
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    /**
     * [permissions description]
     * @return [type] [description]
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Entity\Permission\Permission', 'ATTACH');
    }
}
