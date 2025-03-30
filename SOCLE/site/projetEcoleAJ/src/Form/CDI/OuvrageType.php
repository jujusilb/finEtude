<?php

namespace App\Form\CDI;

use App\Entity\CDI\Auteur;
use App\Entity\CDI\CategorieOuvrage;
use App\Entity\CDI\Ouvrage;
use App\Entity\CDI\StatutOuvrage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OuvrageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label'=>'Titre de l\'ouvrage',
                'attr'=>[
                    'aria-label'=>'Titre de l\'ouvrage',
                    'placeholder'=>'Titre de l\'ouvrage'
                ]
            ])
            ->add('categorieOuvrages', EntityType::class, [
                'class' => CategorieOuvrage::class,
                'choice_label' => 'libelle',
                'multiple' => true,
            ])
            ->add('statutOuvrage', EntityType::class, [
                'class' => StatutOuvrage::class,
                'choice_label' => 'libelle',
            ])
            ->add('auteur', EntityType::class, [
                'class' => Auteur::class,
                'choice_label' => function (Auteur $auteur){
                    return $auteur->getPrenom().' '.$auteur->getNom();
                },
                'multiple' => true,
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
