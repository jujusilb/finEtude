<?php

namespace App\Form\Forum;

use App\Entity\Forum\Message;
use App\Entity\Forum\Thread;
use App\Entity\Utilisateur\Membre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessagerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('destinataire', EntityType::class, [
            'label'=>'Destinataire',
            'attr'=>[
                'aria-label'=>'Destinaire',
                'class'=>'mx-auto'
            ],
            'class' => Membre::class,
            'choice_label' => function(Membre $destinataire){
               return $destinataire->getPrenom().' '.$destinataire->getNom();
            },'required' => false, 
            'placeholder' => 'Choisissez un destinataire', 
    ])
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
