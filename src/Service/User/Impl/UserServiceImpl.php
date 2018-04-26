<?php

namespace App\Service\User\Impl;

use App\Entity\User;
use App\Service\BaseService;
use App\Service\User\UserService;

class UserServiceImpl extends BaseService implements UserService
{
    public function get($id)
    {
        return $this->getDoctrine()->getRepository(User::class)->find($id);
    }
}
