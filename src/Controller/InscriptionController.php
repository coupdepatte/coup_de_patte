<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Entity\Utilisateur;
use App\Form\InscriptionType;
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
    public function index(UserPasswordHasherInterface $passwordHasher, DepartementRepository $repoDepartement,UtilisateurRepository $repoUtilisateur, Request $request, RoleRepository $repoRole,LieuRepository $repoLieu,  EntityManagerInterface $manager): Response
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
            $this->addFlash('success', "<script>Swal.fire({
                position: 'center',
                icon:'success', 
                title:'Votre adresse a bien ete ajouté!', 
                showCinfirmation:false,
                timer: 1500
            })</script>");
            return $this->redirectToRoute('app_connection');
        }
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
            'form_inscription' => $form_inscription->createView(),
        ]);
    }
}
