<?php

namespace App\Service\User\Impl;

use App\Service\BaseService;
use App\Service\User\UserService;

class UserServiceImpl extends BaseService implements UserService
{
    public function get($id)
    {
        var_dump($id);
        return $id;
    }
}
