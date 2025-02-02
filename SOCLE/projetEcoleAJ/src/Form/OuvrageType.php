<?php

namespace App\Form;

use App\Entity\Emprunt;
use App\Entity\Ouvrage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OuvrageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [])
            ->add('categorie', ChoiceType::Class, [
                'choices' => [
                    'Drame' => 'Drame',
                    'Fantastique' => 'Fantastique',
                    'Historique' => 'Historique',
                    'Horreur' => 'Horreur',
                    'Humour' => 'Humour',
                    'Jeunesse' => 'Jeunesse',
                    'Policier' => 'Disponible',
                    'Sciences-Fiction' => 'Science-Fiction',
                ],
                'multiple' => false,  // Allow multiple roles to be selected
                'expanded' => false,   // Use checkboxes to select multiple roles
            ])
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Disponible' => 'Disponible',
                    'Emprunté' => 'Emprunté',
                ],
                'multiple' => false,  // Allow multiple roles to be selected
                'expanded' => false,   // Use checkboxes to select multiple roles
            ])
            ->add('emprunt', EntityType::class, [
                'class' => Emprunt::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ouvrage::class,
        ]);
    }
}
