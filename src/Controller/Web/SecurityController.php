<?php

namespace App\Controller\Web;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller\Web
 * @Security("!is_granted('IS_AUTHENTICATED_FULLY')")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $last_username = $authenticationUtils->getLastUsername();
        $error         = $authenticationUtils->getLastAuthenticationError();

        return $this->render('web/security/index.html.twig', [
            'last_username' => $last_username,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        throw new \RuntimeException('this should not be reached!');
    }
}
