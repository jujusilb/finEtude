<?php

namespace App\Form\Communication;

use App\Entity\Communication\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('sujet', TextType::class, [
            'label'=>'Sujet',
            'attr'=>[
                'aria-label'=>'Sujet',
                'placeholder'=>'Sujet',
                'class' => 'mx-auta'
            ],
            'required' => true
        ])

        ->add('contenu', TextareaType::class, [
            'label' => 'Contenu du message',
            'attr' => [
                'aria-label' => 'Contenu du message',
                'placeholder' =>'Contenu du message'
            ],
            'required'=>true,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
