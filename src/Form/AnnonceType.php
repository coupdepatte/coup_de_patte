<?php

namespace App\Form;

use App\Entity\Race;
use App\Entity\Animal;
use App\Entity\Statut;
use App\Entity\Taille;
use App\Entity\Typepoils;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomAnimal', TextType::class)
            ->add('poidAnimal', TextType::class)
            ->add('ageAnimal', TextType::class)
            ->add('texteAnimal')
            ->add('prixAnimal', TextType::class)
            ->add('lofAnimal', EntityType::class, [
                'class' => Animal::class,
                'choice_label' => 'lofAnimal',
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
                'label' => false
                // 'expanded' => true,
            ])
            ->add('isFeminin', EntityType::class, [
                'class' => Animal::class,
                'choice_label' => 'isFeminin',
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
                'label' => false
                // 'expanded' => true,
            ])
            ->add('isVaccine', EntityType::class, [
                'class' => Animal::class,
                'choice_label' => 'isVaccine',
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
                'label' => false
                // 'expanded' => true,
            ])
            ->add('isIdentifie', EntityType::class, [
                'class' => Animal::class,
                'choice_label' => 'isIdentifie',
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
                'label' => false
                // 'expanded' => true,
            ])
            ->add('idRace', EntityType::class, [
                'class' => Race::class,
                'choice_label' => 'idRace',
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
                'label' => false
                // 'expanded' => true,
            ])
            ->add('idTypepoils', EntityType::class, [
                'class' => Typepoils::class,
                'choice_label' => 'idTypepoils',
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
                'label' => false
                // 'expanded' => true,
            ])
            ->add('idStatut', EntityType::class, [
                'class' => Statut::class,
                'choice_label' => 'idStatut',
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
                'label' => false
                // 'expanded' => true,
            ])
            //->add('idUtilisateur')
            ->add('idCouleur', TextType::class)
            ->add('idTaille', EntityType::class, [
                'class' => Taille::class,
                'choice_label' => 'idTaille',
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
                'label' => false
                // 'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
