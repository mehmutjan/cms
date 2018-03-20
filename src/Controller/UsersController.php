<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        $id = 1;
        $product = $this->getDoctrine()
            ->getRepository(Users::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }
}
