<?php

namespace App\Controller;


use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index( AnimalRepository $repoAnimal): Response
    {
    
        $animaux = $repoAnimal->findAll();
        // dd($animaux);
        // $nomAnimal=$repoAnimal->findOneByIdRace();
        // dd($nomAnimal);


        return $this->render('accueil/index.html.twig', [
            'animaux'=> $animaux,
        ]);
    }
}
