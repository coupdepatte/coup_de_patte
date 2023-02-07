<?php

namespace App\Controller;

use DateTime;
use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
 {
    #[ Route( '/dashboard', name: 'app_dashboard' ) ]

    public function index( AnimalRepository $repoAnimal, UserInterface $utilisateurCo ): Response
 {
        $annonces = $repoAnimal->findByIdUtilisateur( $utilisateurCo );
        return $this->render( 'dashboard/index.html.twig', [
            'annonces' => $annonces,
            'pseudo' => $pseudo,
        ] );

    }



#[ Route( '/dashboard/ajouter-article', name: 'app_dashboard_ajouter' ) ]

public function ajouterAnnoce( Request $request, UserInterface $utilisateurCo, EntityManagerInterface $manager ): Response{




        $animal = new Animal();
        $form_animal = $this->createForm( ArticleType::class, $animal );

        $form_animal->handleRequest( $request );

        if ( $form_animal->isSubmitted() && $form_animal->isValid() ) {
            $animal->setIdUtilisateur( $utilisateurCo );
            $animal->setDateCreation( new DateTime() );

            $slugify = new Slugify();
            $slug = $slugify->slugify( $animal->getTitre() );
            $animal->setSlug( $slug );

            $images = $form_animal->get( 'images' )->getData();

            foreach ( $images as $image ) {
                // On génère un nouveau nom de fichier
                $fichier = md5( uniqid() ).'.'.$image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter( 'images_directory' ),
                    $fichier
                );

                // On crée l'image dans la base de données
                $img = new Images();
                $img->setNomImage($fichier);
                $img->setIdArticle($animal);
                $manager->persist( $img );
            }
        
            $manager->persist( $animal );
            $manager->flush();
            $this->addFlash('success',"
                            <script>Swal.fire({
                            position: 'center' ,
                            icon: 'success' ,
                            title: 'Article ajouté' ,
                            showConfirmButotn: false,
                            timer:1500})</script>");
            
            return $this->redirectToRoute( 'app_dashboard_ajouter' );

            //dd( $article );
        }

        return $this->render( 'dashboard/ajouter.html.twig', [

            'form_animal' => $form_animal->createView(),
            ] );

        }
    }
