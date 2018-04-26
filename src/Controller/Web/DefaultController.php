<?php

namespace App\Controller\Web;

use App\Controller\BaseController;
use App\Service\User\Impl\UserServiceImpl;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $this->getUserService()->get(1);
        return $this->render('base.html.twig');
    }

    /**
     * @return \App\Service\User\Impl\UserServiceImpl
     */
    protected function getUserService()
    {
        return $this->container->get('app.service.user.user_service');
    }
}