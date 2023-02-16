<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\MessageType;
use App\Service\SendMailService;
use Symfony\Component\Mime\Email;
use App\Repository\ImageRepository;
use App\Repository\AnimalRepository;
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
    public function index($id, Request $request, MailerInterface $mailer, UserInterface $utilisateurCo, AnimalRepository $repoAnimal, UtilisateurRepository $repoUtilisateur, ImageRepository $repoImage, EntityManagerInterface $manager): Response
    {
        $form_message = $this->createForm(MessageType::class);
        $form_message->handleRequest($request);
        $animal = $repoAnimal->findOneByIdAnimal($id);
        //dd($animal);
        $images = $repoImage->findByIdAnimal($id);
        foreach($images as $image){
            $URLImage[] = $image->getImage();
        };
        //dd($URLImage);
        $vendeur = $repoUtilisateur->findOneByIdUtilisateur($animal->getIdUtilisateur());
        //dd($vendeur);
        if($form_message->isSubmitted() && $form_message->isValid()){
            $email = (new Email())
            ->from($utilisateurCo->getLoginUtilisateur())
            ->to($vendeur->getLoginUtilisateur())
            ->subject('Voter annonce coup de patte à trouvé preneur')
            ->html($form_message->get('message')->getData());
        try {    
            $mailer->send($email);
            }catch (TransportExceptionInterface $e) {
                // some error prevented the email sending; display an
                // error message or try to resend the message
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
        ]);
    }
}
