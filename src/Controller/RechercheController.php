<?php

namespace App\Controller;

use App\Entity\Race;
use App\Entity\Taille;
use App\Entity\Couleur;
use App\Entity\Typepoils;
use App\Entity\Typeanimal;
use App\Repository\RaceRepository;
use App\Repository\TailleRepository;
use App\Repository\CouleurRepository;
use App\Repository\TypepoilsRepository;
use App\Repository\TypeanimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function index(RaceRepository $repoRace, TypeanimalRepository $repoTypeAnimal, TailleRepository $repoTaille, CouleurRepository $repoCouleur, TypepoilsRepository $repoPoils): Response
    {

        $races = new Race();
        $races = $repoRace->findAll();

        $typesAnimal = new Typeanimal();
        $typesAnimal = $repoTypeAnimal->findAll();

        $tailles = new Taille();
        $tailles = $repoTaille->findAll();

        $couleurs = new Couleur();
        $couleurs = $repoCouleur->findAll();

        $typespoils = new Typepoils();
        $typespoils = $repoPoils->findAll();

        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'races' => $races,
            'typesAnimal' => $typesAnimal,
            'tailles' => $tailles,
            'couleurs' => $couleurs,
            'typespoils' => $typespoils,
        ]);
    }
}
