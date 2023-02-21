<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Animal;
use App\Repository\ImageRepository;
use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index( AnimalRepository $repoAnimal, ImageRepository $repoImage): Response
    {

        $animaux = $repoAnimal->findAll();
        $images = $repoImage->findAll();
        $idAnimaux = $repoAnimal->findByIdAnimal($animaux);

        $tabAnimaux = [];
        foreach($animaux as $animal){
        $n = $animal->getIdAnimal();
        array_splice($tabAnimaux, $n, 1, $n);
        }
        
        $tabPhotos = [];
        foreach($animaux as $animal){
            $n = $animal->getIdAnimal();
            $images = $repoImage->findByIdAnimal($animal);
            $image = $images[0];

            array_splice($tabPhotos, $n, 1 ,$image->getImage($repoAnimal->findOneByIdAnimal($animal->getIdAnimal())));
        }
        $tabIdAnimauxPhoto = array_combine($tabAnimaux, $tabPhotos);
        return $this->render('accueil/index.html.twig', [
            'animaux'=> $animaux,
            'images'=>$images,
            'tabPhotos' => $tabPhotos,
            'tabAnimaux' => $tabAnimaux, 
            'tabIdAnimauxPhoto' => $tabIdAnimauxPhoto ,
        ]);
    }
    
    public function logout(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController'
        ]);
    }
}
