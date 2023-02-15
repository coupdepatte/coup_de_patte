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
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnonceType extends AbstractType {
    public function buildForm( FormBuilderInterface $builder, array $options ): void {
        $builder
        ->add( 'nomAnimal', TextType::class, [ 'attr'=>[ 'class'=>'form-control ', 'placeholder' => 'Insérez le nom de l\'animal'], 'label' => false])
            ->add('poidAnimal', TextType::class, ['attr'=>['class'=>'form-control ', 'placeholder' => 'Insérez le poid de l\'animal' ], 'label' => false ] )
        ->add( 'ageAnimal', TextType::class, [ 'attr'=>[ 'class'=>'form-control ', 'placeholder' => 'Insérez l\'age de l\'animal' ], 'label' => false ] )
        ->add( 'texteAnimal', CKEditorType::class, [ 'attr'=>[ 'class'=>'form-control  mt-4', 'placeholder' => 'Insérez une description' ], 'label' => false ] )
        ->add( 'prixAnimal', NumberType::class, [ 'attr'=>[ 'class'=>'form-control ', 'placeholder' => 'Insérez votre prix' ], 'empty_data' => '0', 'label' => false ] )
        ->add( 'lofAnimal', ChoiceType::class, [
            'choices'  => [
                'Oui' => 'OUI',
                'Non' => 'NON',
            ],
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
        ] )
        ->add( 'isFeminin', ChoiceType::class, [
            'choices'  => [
                'Feminin' => 'OUI',
                'Masculin' => 'NON',
            ],
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
        ] )
        ->add( 'isVaccine', ChoiceType::class, [
            'choices'  => [
                'Oui' => 'OUI',
                'Non' => 'NON',
            ],
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
        ] )
        ->add( 'isIdentifie', ChoiceType::class, [
            'choices'  => [
                'Oui' => 'OUI',
                'Non' => 'NON',
            ],
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
        ] )
        ->add( 'idRace', EntityType::class, [
            'class' => Race::class,
            'choice_label' => 'nomRace',
            'multiple' => false,
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
            // 'expanded' => true,
        ] )
        ->add( 'idTypepoils', EntityType::class, [
            'class' => Typepoils::class,
            'choice_label' => 'nomTypepoils',
            'multiple' => false,
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
            // 'expanded' => true,
        ] )
        ->add( 'idStatut', EntityType::class, [
            'class' => Statut::class,
            'choice_label' => 'nomStatut',
            'multiple' => false,
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
            // 'expanded' => true,
        ] )
        //->add( 'idUtilisateur' )
        ->add( 'idCouleur', EntityType::class, [
            'class' => Couleur::class,
            'choice_label' => 'nomCouleur',
            'multiple' => false,
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
            // 'expanded' => true,
        ] )

        ->add( 'idTaille', EntityType::class, [
            'class' => Taille::class,
            'choice_label' => 'nomTaille',
            'multiple' => false,
            'attr' => [ 'class' => 'form-select' ],
            'label' => false
            // 'expanded' => true,
        ] )

        ->add( 'images', FileType::class, [
            'label' => false,
            'multiple' => true,
            'mapped' => false,
            'required' => false,
            'attr' => [ 'class' => 'uploadFile img', 'style'=>'width: 0px;height: 0px;overflow: hidden;' ],
        ] )

        ->add( 'save', SubmitType::class, [ 'label' => 'Créer', 'attr'=>[ 'class'=>'btn btn-primary' ] ] )
        ;
    }

    public function configureOptions( OptionsResolver $resolver ): void {
        $resolver->setDefaults( [
            'data_class' => Animal::class,
        ] );
    }
}
