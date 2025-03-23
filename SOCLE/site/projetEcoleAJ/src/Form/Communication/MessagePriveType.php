<?php

namespace App\Form\Communication;

use App\Entity\Communication\MessagePrive;
use App\Entity\Utilisateur\Membre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessagePriveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('destinataire', EntityType::class, [
                'class' => Membre::class,
                'choice_label' => function(Membre $membre){
                    return $membre->getPrenom().' '.$membre->getNom();
                },
            ])    
            ->add('sujet')
            ->add('contenu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MessagePrive::class,
        ]);
    }
}
