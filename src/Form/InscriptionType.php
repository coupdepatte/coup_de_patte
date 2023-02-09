<?php

namespace App\Form;

use App\Entity\Lieu;
use App\Entity\Departement;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        // ->add('idUtilisateur')
            ->add('nomUtilisateur', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Nom'],'label'=> false])
            ->add('prenomUtilisateur', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Prenom'],'label'=> false])
            ->add('pseudoUtilisateur', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Pseudo'],'label'=> false])
            ->add('loginUtilisateur', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Email'],'label'=> false])
            ->add('mdpUtilisateur', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passes doivent correspondre.',
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Répétez le mot de passe'],
                'options' => ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Mdp']],
            ])
            ->add('adressse', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Adresse'],'label'=> false])
            ->add('codeVille', TextType::class, [
                'attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Adresse'],
                'label'=> false,
                'mapped'=>false])
            ->add('nomLieu', TextType::class, [
                'attr'=>['class'=>'form-control mt-2',
                'placeholder' => 'Insérez votre Adresse'],
                'mapped'=>false,
                'label'=> false])
            ->add('departement', EntityType::class,[
                'class' => Departement::class,
                'choice_label' => 'nomDepartement',
                'multiple' => false,
                'attr' => ['class'=>'form-select'],
                'label' => false,
                'mapped'=>false,
                
            ])
            ->add('codeInsee', TextType::class, [
                'attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Adresse'],
                'label'=> false,
                'mapped'=>false,])
            ->add('longitudeAdresse')
            ->add('latitudeAdresse')
        // ->add('idRole')
            ->add('save', SubmitType::class, ['label' => 'Créer', 'attr'=>['class'=>'btn btn-dark']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class
            // Configure your form options here
        ]);
    }
}
