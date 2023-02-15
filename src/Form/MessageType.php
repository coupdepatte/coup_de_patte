<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('to', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Nom'],'label'=> false])
            //->add('from', TextType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre Nom'],'label'=> false])
            ->add('message', TextareaType::class, ['attr'=>['class'=>'form-control mt-2','placeholder' => 'Insérez votre message'],'label'=> false])
            ->add('save', SubmitType::class, ['label' => 'envoyer', 'attr'=>['class'=>'btn btn-dark']])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
