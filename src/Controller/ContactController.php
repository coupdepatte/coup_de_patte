<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MailerInterface $mailer, Request $request, MessageBusInterface $bus): Response
    {
        $form_contact = $this->createForm(ContactType::class);
        $form_contact->handleRequest($request);
        if($form_contact->isSubmitted() && $form_contact->isValid()){
        $email = (new Email())
            ->from($form_contact->get('email')->getData())
            ->to('61882842dd8a8f@sandbox.smtp.mailtrap.io')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->html("nom: " . $form_contact->get('nom')->getData() .
            " prenom:  " . $form_contact->get('prenom')->getData() .
            " pseudo:  " . $form_contact->get('pseudo')->getData() .
            " email:  " . $form_contact->get('email')->getData() .
            " adresse:  " . $form_contact->get('adresse')->getData() .
            " codepostal:  " . $form_contact->get('codepostal')->getData() .
            " ville:  " . $form_contact->get('ville')->getData() .
            " commentaire:  " . $form_contact->get('commentaire')->getData());
            //->text($form_contact->get('commentaire')->getData());
        try {    
        $mailer->send($email);
        }catch (TransportExceptionInterface $e) {
            // some error prevented the email sending; display an
            // error message or try to resend the message
        }
        return $this->redirectToRoute('app_accueil');
    }
        $active_contact= 'active';
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form_contact' => $form_contact->createView(),
            'active_contact' => $active_contact,
        ]);
    }
}
