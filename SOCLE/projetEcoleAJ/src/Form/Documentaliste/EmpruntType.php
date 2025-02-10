<?php

namespace App\Form\Documentaliste;

use App\Entity\Documentaliste\Emprunt;
use App\Entity\Utilisateur\Membre;
use App\Entity\Documentaliste\Ouvrage;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateEmprunt', null, [
                'widget' => 'single_text',
            ])
            
            ->add('ouvrage', EntityType::class, [
                'class' => Ouvrage::class,
                'choice_label' => 'titre',
            ])
            /*
            >add('membre', EntityType::class, [
                'class' => Membre::class,
                'choice_label' => 'nom',
            ])
            */
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'En Cours' => 'En Cours',
                    'Rendu' => 'Rendu',
                ],
                'multiple' => false,  // Allow multiple roles to be selected
                'expanded' => false,   // Use checkboxes to select multiple roles
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
