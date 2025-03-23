<?php

namespace App\Form\CDI;

use App\Entity\CDI\CategorieOuvrage;
use App\Entity\CDI\Emprunt;
use App\Entity\CDI\Ouvrage;

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
            ->add('categorieOuvrages', EntityType::class, [
                'class' =>CategorieOuvrage::class,
                'choice_label' => 'libelle',
            ])
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Disponible' => 'Disponible',
                    'Emprunté' => 'Emprunté',
                ],
                'multiple' => false,  // Allow multiple roles to be selected
                'expanded' => false,   // Use checkboxes to select multiple roles
            ])
            /*
            ->add('emprunt', EntityType::class, [
                'class' => Emprunt::class,
                'choice_label' => 'id',
            ])
        */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ouvrage::class,
        ]);
    }
}
