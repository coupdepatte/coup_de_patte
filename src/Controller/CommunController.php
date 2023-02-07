<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommunController extends AbstractController
{
    #[Route('/commun', name: 'app_commun')]
    public function index(): Response
    {
        return $this->render('commun/index.html.twig', [
            'controller_name' => 'CommunController',
        ]);
    }
}
