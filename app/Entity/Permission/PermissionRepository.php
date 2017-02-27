<?php

namespace App\Entity\Permission;

use App\Entity\Permission\Permission;
use App\Entity\Base\Repository;

class PermissionRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Permission::class;
    }
}
