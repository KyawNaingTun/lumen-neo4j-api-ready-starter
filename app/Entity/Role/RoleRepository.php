<?php

namespace App\Entity\Role;

use App\Entity\Role\Role;
use App\Entity\Base\Repository;

class RoleRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Role::class;
    }
}
