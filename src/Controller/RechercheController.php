<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Statut;
use App\Entity\Taille;
use App\Entity\Typepoils;
use App\Entity\Typeanimal;
use App\Repository\RaceRepository;
use App\Repository\ImageRepository;
use App\Repository\AnimalRepository;
use App\Repository\TypeanimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function search(Request $request, EntityManagerInterface $manager, ImageRepository $repoImage, AnimalRepository $animalRepository, RaceRepository $repoRace, TypeanimalRepository $typeanimalRepo): Response
    {
        //Création du formulaire de recherche
        $form_recherche = $this->createFormBuilder()
            ->add('typesAnimal', EntityType::class, [
                'class' => Typeanimal::class,
                'choice_label' => 'nomType',
                'mapped' => false,
                'label' => false,
                'attr' => ['class' => 'form-select'],
                'required' => true,
            ])
            ->add('isFeminin', ChoiceType::class, [
                'choices' => [
                    'femelle' => 'OUI',
                    'male' => 'NON',
                ],
                'label' => false,
                'required' => true,
            ])
            ->add('lofAnimal', ChoiceType::class, [
                'choices' => [
                    'lof' => 'OUI',
                    'non lof' => 'NON',
                ],
                'label' => false,
                'required' => true,
            ])
            ->add('idTaille', EntityType::class, [
                'class' => Taille::class,
                'choice_label' => 'nomTaille',
                'label' => false,
                'mapped' => true,
                'required' => true,
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('idTypepoils', EntityType::class, [
                'class' => Typepoils::class,
                'choice_label' => 'nomTypepoils',
                'label' => false,
                'mapped' => true,
                'multiple' => false,
                'required' => true,
                'expanded' => true,
            ])
            ->add('idStatut', EntityType::class,  [
                'class' => Statut::class,
                'choice_label' => 'nomStatut',
                'label' => false,
                'mapped' => true,
                'multiple' => false,
                'required' => true,
                'expanded' => true,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'soumettre',
                'attr' => [
                'class' => 'btn btn-secondary'
                    ]
            ])
            ->getForm();
            $animaux = $animalRepository->findAll();
            $images = $repoImage->findAll();
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
                array_splice($tabPhotos, $n, 1, $image->getImage($animalRepository->findOneByIdAnimal($animal->getIdAnimal())));
            }
            $recherche = [];
            $tabIdAnimauxPhoto = array_combine($tabAnimaux, $tabPhotos);
            $form_recherche->handleRequest($request);
            if($form_recherche->isSubmitted() && $form_recherche->isValid()) {
                $criteria = $form_recherche->getData();
                $idTypes = $form_recherche->get('typesAnimal')->getData();
                $idType = $idTypes->getIdTypeAnimal();
                array_unshift($criteria, $idType);
                $recherche = $animalRepository->findByTypeanimal($criteria);
            }
            
        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'form_recherche' => $form_recherche,
            'recherche' => $recherche,
            'tabIdAnimauxPhoto' => $tabIdAnimauxPhoto,
        ]);
    }
}