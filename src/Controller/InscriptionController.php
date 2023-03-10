<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Entity\Utilisateur;
use App\Service\JWTService;
use App\Form\InscriptionType;
use App\Service\SendMailService;
use App\Repository\LieuRepository;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DepartementRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(UserPasswordHasherInterface $passwordHasher, SendMailService $mail, DepartementRepository $repoDepartement,UtilisateurRepository $repoUtilisateur, Request $request, RoleRepository $repoRole,LieuRepository $repoLieu,  EntityManagerInterface $manager, JWTService $jwt,): Response
    {
        $utilisateur = new Utilisateur();
        $form_inscription = $this->createForm(InscriptionType::class, $utilisateur);
        $form_inscription->handleRequest($request);
        if($form_inscription->isSubmitted() && $form_inscription->isValid()){
            $role = $repoRole->findOneByIdRole(1);
            $utilisateur->setIdRole($role);
            $mdpHashe = $passwordHasher->hashPassword($utilisateur, $utilisateur->getMdpUtilisateur());
            $utilisateur->setMdpUtilisateur($mdpHashe);
            $lieu = $form_inscription->get('nomLieu')->getData();
            $idDeps = $form_inscription->get('departement')->getData();
            $idDep = $idDeps->getIdDepartement();
            $repoUtilisateur->ajouterUneVille(
                $nomVille = $form_inscription->get('nomLieu')->getData(),
                $codeVille = $form_inscription->get('codeVille')->getData(),
                $codeInsee = $form_inscription->get('codeInsee')->getData(), 
                $idDepartement = $idDep);
            $idVilles = $repoLieu->findOneByNomVille($form_inscription->get('nomLieu')->getData());
            $utilisateur->setIdLieu($idVilles);
            $manager->persist($utilisateur);
            $manager->flush();
            // On g??n??re le JWT de l'utilisateur
            // On cr??e le Header
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];
            // On cr??e le Payload
            $payload = [
                'user_id' => $utilisateur->getIdUtilisateur()
            ];
            // On g??n??re le token
            $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'));
            // On envoie un mail
            $mail->send(
                'no-reply@coupdepatte.com',
                $utilisateur->getLoginUtilisateur(),
                'Activation de votre compte sur le site coup de patte',
                'register',
                compact('utilisateur', 'token')
            );
            $this->addFlash('success', "<script>Swal.fire({
                position: 'center',
                icon:'success', 
                title:'Votre adresse a bien ete ajout??!', 
                showCinfirmation:false,
                timer: 1500
            })</script>");
            return $this->redirectToRoute('app_connection');
        }
        $active_inscription= 'active';
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
            'form_inscription' => $form_inscription->createView(),
            'active_inscription' => $active_inscription,
        ]);
    }

    #[Route('/verif/{token}', name: 'verify_user')]
    public function verifyUser($token, SendMailService $mail, JWTService $jwt, UtilisateurRepository $repoUtilisateur, EntityManagerInterface $em): Response
    {
        //On v??rifie si le token est valide, n'a pas expir?? et n'a pas ??t?? modifi??
        if($jwt->isValid($token) && !$jwt->isExpired($token) && $jwt->check($token, $this->getParameter('app.jwtsecret'))){
            // On r??cup??re le payload
            $payload = $jwt->getPayload($token);
            // On r??cup??re le user du token
            $utilisateur = $repoUtilisateur->find($payload['user_id']);
            //On v??rifie que l'utilisateur existe et n'a pas encore activ?? son compte
            if($utilisateur  && !$utilisateur->getIsVerified()){
                $utilisateur  ->setIsVerified(true);
                $em->flush($utilisateur);
                $this->addFlash('success', 'Utilisateur activ??');
                return $this->redirectToRoute('app_dashboard');
            }
        }
        // Ici un probl??me se pose dans le token
        $this->addFlash('danger', 'Le token est invalide ou a expir??');
        return $this->redirectToRoute('app_connection');
    }

    #[Route('/renvoiverif', name: 'resend_verif')]
    public function resendVerif( JWTService $jwt, UtilisateurRepository $repoUtilisateur, SendMailService $mail): Response
    {
        $utilisateur = $this->getUser();
        if(!$utilisateur){
            $this->addFlash('danger', 'Vous devez ??tre connect?? pour acc??der ?? cette page');
            return $this->redirectToRoute('app_connection');
        }
        if($utilisateur->getIsVerified()){
            $this->addFlash('warning', 'cet utilisateur est d??j?? activ??!');
            return $this->redirectToRoute('app_dashboard');
        }
        // On g??n??re le JWT de l'utilisateur
            // On cr??e le Header
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];
            // On cr??e le Payload
            $payload = [
                'user_id' => $utilisateur->getIdUtilisateur()
            ];
            // On g??n??re le token
            $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'));
            // On envoie un mail
            $mail->send(
                'no-reply@coupdepatte.com',
                $utilisateur->getLoginUtilisateur(),
                'Activation de votre compte sur le site coup de patte',
                'register',
                compact('utilisateur', 'token')
            );
            return $this->redirectToRoute('app_connection');
    }
}
