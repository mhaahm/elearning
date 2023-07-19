<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    #[Route('/logout',name: 'app_logout',methods: ['GET'])]
    public function logout(): never
    {
        throw new \Exception("logout");
    }

    #[Route('/connect/facebook', name: 'connect_facebook')]
    public function connectAction(ClientRegistry $clientRegistry)
    {
        //Redirect to facebook
        return $clientRegistry->getClient('facebook')->redirect(['public_profile', 'email'], []);
    }


    #[Route('/connect/facebook/check', name: 'connect_facebook_check')]
    public function connectCheckAction(Request $request)
    {

    }
}
