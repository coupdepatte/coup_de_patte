<?php

namespace App\Form;

use App\Entity\Departement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Nom'],'label'=> false, 'mapped'=>false])
            ->add('prenom', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Nom'],'label'=> false, 'mapped'=>false])
            ->add('pseudo', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Nom'],'label'=> false, 'mapped'=>false])
            ->add('email', EmailType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Nom'],'label'=> false, 'mapped'=>false])
            ->add('adresse', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Adresse'],'label'=> false, 'mapped'=>false])
            ->add('codepostal', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Adresse'],'label'=> false, 'mapped'=>false])
            ->add('ville', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Adresse'],'label'=> false, 'mapped'=>false])
            ->add('departement', EntityType::class,[
                'class' => Departement::class,
                'choice_label' => 'nomDepartement',
                'multiple' => false,
                'attr' => ['class'=>'form-select'],
                'label' => false,
                'mapped'=>false,
            ])
            ->add('commentaire', TextareaType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre message'],'label'=> false, 'mapped'=>false])
            ->add('save', SubmitType::class, ['label' => 'Créer', 'attr'=>['class'=>'btn btn-dark']])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
