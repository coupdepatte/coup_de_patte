<?php

namespace App\Form;

use App\Entity\Race;
use App\Entity\Animal;
use App\Entity\Statut;
use App\Entity\Taille;
use App\Entity\Couleur;
use App\Entity\Typepoils;
use App\Entity\Typeanimal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idTypeanimal', EntityType::class, [
                'class' => Typeanimal::class,
                'choice_label' => 'nomType',
                'multiple' => false,
                'expanded' => true,
                'mapped' => false,
                'label' => false,
            ])
            ->add('idRace', EntityType::class, [
                'class' => Race::class,
                'choice_label' => 'nomRace',
                'multiple' => true,
                'expanded' => true,
                'label' => false,
                'mapped' => false,
            ])
            ->add('isFeminin', ChoiceType::class, [
                'choices' => [
                    'Femelle' => 'oui',
                    'Male' => 'non',
                    'Tous'  => null,
                ],
                'label' => false,
            ])
            ->add('lofAnimal', ChoiceType::class, [
                'choices' => [
                    'lof' => 'oui',
                    'non lof' => 'non',
                    'Tous' => null,
                ],
                'label' => false,
            ])
            ->add('idTaille', EntityType::class, [
                'class' => Taille::class,
                'choice_label' => 'nomTaille',
                'multiple' => true,
                'expanded' => true,
                'label' => false,
                'required' => false,
                'mapped' => false,
            ])
            ->add('idCouleur', EntityType::class, [ 
                'class' => Couleur::class,
                'choice_label' => 'nomCouleur',
                'multiple' => true,
                'expanded' => true,
                'label' => false,
                'required' => false,
                'mapped' => false,
                ])
            ->add('idTypepoils', EntityType::class, [
                'class' => Typepoils::class,
                'choice_label' => 'nomTypepoils',
                'multiple' => true,
                'expanded' => true,
                'label' => false,
                'required' => false,
                'mapped' => false,
                ])
            ->add('idStatut', EntityType::class,  [
                'class' => Statut::class,
                'choice_label' => 'nomStatut',
                'multiple' => true,
                'expanded' => true,
                'label' => false,
                'required' => false,
                'mapped' => false,
                ])
            ->add('save', SubmitType::class, [
                'label' => 'soumettre',
                'attr' => [
                'class' => 'btn btn-secondary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
