<?php

namespace App\Entity\Permission;

use App\Entity\Base\Model;

use App\Entrust\EntrustPermission;

class Permission extends EntrustPermission
  {

    protected $table = 'permissions';//define neo label
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'name', 'display_name', 'description'
     ];
}
