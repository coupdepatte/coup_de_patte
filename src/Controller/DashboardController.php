<?php

namespace App\Controller;

use DateTime;
use App\Entity\Image;
use App\Entity\Animal;
use App\Form\AnnonceType;
use Doctrine\ORM\EntityManager;
use App\Repository\ImageRepository;
use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
 {
    #[ Route( '/dashboard', name: 'app_dashboard' ) ]

    public function index(EntityManagerInterface $manager, UtilisateurRepository $repoUtilisateur, ImageRepository $imageRepo, AnimalRepository $repoAnimal, UserInterface $utilisateurCo ): Response
 {
        
        $animals = $repoAnimal->articleParSonIdUtilisateur($utilisateurCo);

        //dd( $animals );
        $utilisateur = $repoUtilisateur->findOneByIdUtilisateur($utilisateurCo);

        $manager->persist($utilisateur);

        return $this->render( 'dashboard/index.html.twig', [
            'animals' => $animals,
            'utilisateur'=>$utilisateur,
        ] );

    }

    #[ Route( 'dashboard/delete/{id}', methods: [ 'GET' ], name:'delete_annonce' ) ]

    public function delete( $id,  AnimalRepository $animalRepository,  ImageRepository $imageRepository, EntityManagerInterface $em ): Response
 {
        $images = $imageRepository->findByIdAnimal($id);
        foreach ($images as $image) {
            $em->remove($image);
            $em->flush();
        }

        $animals = $animalRepository->findOneByIdAnimal($id);

        $em->remove($animals);
        $em->flush();

        return $this->redirectToRoute('app_dashboard');

    }

    #[ Route( '/dashboard/ajouter-article', name: 'app_dashboard_ajouter' ) ]

    public function ajouterAnnoce( Request $request, UserInterface $utilisateurCo, EntityManagerInterface $manager, AnimalRepository $repoAnimal ): Response {

        $animal = new Animal();
        $form_animal = $this->createForm( AnnonceType::class, $animal );
        $form_animal->handleRequest( $request );
        if ( $form_animal->isSubmitted() && $form_animal->isValid() ) {
            $animal->setIdUtilisateur( $utilisateurCo );

            $manager->persist( $animal );
            $manager->flush();

            $images =  $form_animal->get( 'images' )->getData();
            //dd( $images );
            foreach ( $images as $image ) {
                $fichier = md5( uniqid() ).'.'.$image->guessExtension();
                $image->move(
                    $this->getParameter( 'images_directory' ),
                    $fichier
                );
                $img = new Image();
                $img->setImage( $fichier );
                $img->setIdAnimal( $animal );

                $manager->persist( $img );
                //dd( $images );

            }

            //dd( $images );
            $manager->flush();

            $this->addFlash( 'success', "<script>Swal.fire({
                position: 'center',
                icon:'success', 
                title:'Votre annonce a bien ete ajouté !', 
                showCinfirmation:false,
                timer: 1500
            })</script>" );
            return $this->redirectToRoute( 'app_dashboard_ajouter' );
        }

        return $this->render( 'dashboard/ajouter.html.twig', [
            'controller_name' => 'AjouterArticleController',
            'form_animal' => $form_animal->createView(),
        ] );
    }
}
