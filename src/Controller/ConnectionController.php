<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnectionController extends AbstractController
{
    #[Route('/connection', name: 'app_connection')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {

         // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

         // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();


        $this->addFlash('errorAuth', 'Le couple email/mot de passe n\'est pas valide');
        
        return $this->render('connection/index.html.twig', [
            'controller_name' => 'ConnectionController',
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

}
