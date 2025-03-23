<?php

namespace App\Form\Forum;

use App\Entity\Communication\Message;
use App\Entity\Forum\Thread;
use App\Entity\Utilisateur\Membre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class MessagerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        /*  
            ->add('destinataire', EntityType::class, [
                'label'=>'Destinataire',
                'attr'=>[
                    'aria-label'=>'Destinaire',
                    'class'=>'mx-auto'
                ],
                'class' => Membre::class,
                'choice_label' => function(Membre $destinataire){
                    return $destinataire->getPrenom().' '.$destinataire->getNom();
                },
                'required' => false, 
                'placeholder' => 'Choisissez un destinataire', 
            ])
        */
            ->add('ajax', TextType::class, [
                'label'=>'Destinataire',
                'mapped'=>false,
                'attr'=>[
                    'aria-label'=>'Destinataire',
                    'class'=>'mx-auto',
                    'placeholder' => 'Choisissez un destinataire', 
                ],
                'required' => true, 
                ])
            ->add('destinataire', HiddenType::class, [])
    


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
