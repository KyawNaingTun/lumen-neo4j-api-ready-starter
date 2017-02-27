<?php

namespace App\Entity\User;

use App\Entity\User\User;
use App\Entity\Base\Repository;

class UserRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return User::class;
    }
}
