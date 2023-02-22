<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\MessageType;
use App\Service\SendMailService;
use Symfony\Component\Mime\Email;
use App\Repository\RaceRepository;
use App\Repository\ImageRepository;
use App\Repository\AnimalRepository;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class AnnonceController extends AbstractController
{
    #[Route('/annonce/{id}', name: 'app_annonce')]
    public function index($id, Request $request, RaceRepository $repoRace, ArticleRepository $repoArticle, MailerInterface $mailer, UserInterface $utilisateurCo, AnimalRepository $repoAnimal, UtilisateurRepository $repoUtilisateur, ImageRepository $repoImage, EntityManagerInterface $manager): Response
    {
        
        $form_message = $this->createForm(MessageType::class);
        $form_message->handleRequest($request);
        //recuperation de l'id du type danimal de l'annonce selectionnée.
        $animal = $repoAnimal->findOneByIdAnimal($id);
        $race = $repoRace->findOneByIdRace($animal->getIdRace());
        $idTypeRace = $race->getIdTypeanimal();
        // recupération des articles qui corespondent au type de l'annimal
        $articles = $repoArticle->findByidTypeanimal($idTypeRace);
        // séparation des articles en deux tableaux (pair et impair) pour les afficher de chaque coté de l'annonce.
        foreach($articles as $article){
            $idarticle = $article->getIdArticle();
            if((fmod($idarticle, 2))==0){
                $tabArticlesPair[] = $article;
            } else {
                $tabArticlesImpair[] = $article;
            }
        }
        //recupration de toutes les images de l'animal de l'annonce.
        $images = $repoImage->findByIdAnimal($id);
        // recuperation des URL de chaque images dans un tableau.
        foreach($images as $image){
            $URLImage[] = $image->getImage();
        };
        //récuperation  des information du vendeur de l'animal.
        $vendeur = $repoUtilisateur->findOneByIdUtilisateur($animal->getIdUtilisateur());
        //création du mail de contact entre vendeur et aquéreur par formulaire.
        if($form_message->isSubmitted() && $form_message->isValid()){
            $email = (new Email())
            ->from($utilisateurCo->getLoginUtilisateur())
            ->to($vendeur->getLoginUtilisateur())
            ->subject('Voter annonce coup de patte à trouvé preneur')
            ->html($form_message->get('message')->getData());
            try {    
            $mailer->send($email);
            }catch (TransportExceptionInterface $e) {
            }
        
        $this->addFlash('success', "<script>Swal.fire({
            position: 'center',
            icon:'success', 
            title:'Votre email à bien été envoyé!', 
            showCinfirmation:false,
            timer: 1500
        })</script>");
        return $this->redirectToRoute('app_dashboard');
        }
        
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'animal' => $animal,
            'URLImage' => $URLImage,
            'form_message' => $form_message->createView(),
            'vendeur' => $vendeur,
            'utilisateurCo' => $utilisateurCo,
            'articles' => $articles,
            'tabArticlesPair' => $tabArticlesPair,
            'tabArticlesImpair' => $tabArticlesImpair,
        ]);
    }
}
