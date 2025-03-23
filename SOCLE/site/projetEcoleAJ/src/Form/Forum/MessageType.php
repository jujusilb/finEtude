<?php

namespace App\Form\Forum;

use App\Entity\Utilisateur\Membre;
use App\Entity\Communication\Message;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            /*
            ->add('expediteur', EntityType::class, [
            'class' => Membre::class,
            'choice_label' => function(Membre $expediteur){
               return $expediteur->getPrenom().' '.$expediteur->getNom();
            },
            'required' => true, 
            'placeholder' => 'Choisissez un expediteur',
            ])
            */
            ->add('destinataire', EntityType::class, [
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
                    'placeholder'=>'Sujet'
                    
                ]
            ])
            ->add('contenu', TextareaType::class, [])
            ->add('privatif', ChoiceType::class, [
                'choices' => [
                    'non' => false,
                    'oui' => true
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
