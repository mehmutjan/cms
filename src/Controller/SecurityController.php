<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
var_dump($lastUsername);
        return $this->render('security/login.html.twig', array(
            'error' => $error,
            'lastUsername' => $lastUsername
        ));
    }

//    /**
//     * @Route("/register", name="register")
//     */
//    public function register(Request $request)
//    {
//        if ('POST' == $request->getMethod()) {
//            $data = $request->request->all();
//            $entityManager = $this->getDoctrine()->getManager();
//            $users = new Users();
//            $users->setUsername($data['_username']);
//            $users->setPassword($data['_password']);
//            $users->setEmail($data['_email']);
//            $entityManager->persist($users);
//            $entityManager->flush($users);
//            return $this->redirect($data['_target_path']);
//        }
//        return $this->render('security/register.html.twig');
//    }
}
