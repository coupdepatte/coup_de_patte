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
        $active_connection = 'active';
        return $this->render('connection/index.html.twig', [
            'controller_name' => 'ConnectionController',
            'last_username' => $lastUsername,
            'error' => $error,
            'active_connection'=>$active_connection,
        ]);
    }

    #[Route('/deconnexion', name: 'app_deconnexion')]
    public function logout(): Response
    {
        
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController'
            
        ]);
    }

    
}
