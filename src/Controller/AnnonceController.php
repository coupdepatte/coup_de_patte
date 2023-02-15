<?php

namespace App\Controller;

use App\Entity\Image;
use App\Repository\ImageRepository;
use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    #[Route('/annonce/{id}', name: 'app_annonce')]
    public function index($id, AnimalRepository $repoAnimal, ImageRepository $repoImage, EntityManagerInterface $manager): Response
    {
        $animal = $repoAnimal->findOneByIdAnimal($id);
        $images = $repoImage->findByIdAnimal($id);
        foreach($images as $image){
            $URLImage = $image->getImage();
        };
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'animal' => $animal,
            'URLImage' => $URLImage,
        ]);
    }
}
