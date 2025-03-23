<?php

namespace App\Form\Pedagogie;

use App\Entity\Pedagogie\Cours;
use App\Entity\Pedagogie\Matiere;
use App\Entity\Pedagogie\Promotion;
//use App\Entity\Utilisateur\Professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                /*
                ->add('date', DateType::class, [
                    'placeholder' => [
                        'year' => 'Année',
                        'month' => 'Mois',
                        'day' => 'Jour',
                    ],
                    'attr' => [
                        'class' => ' d-inline',
                        'aria-label' => 'Date de début' // Ajout d'un label pour l'accessibilité si nécessaire
                    ],
                    ])
                    */
            ->add('libelle', TextType::class, [
                'label' => 'Libellé du cours',
                'attr'=>[
                    'aria-label'=>'Libellé du cours',
                    'placeholder'=>'Libellé du cours'
                ]
            ])
            
            ->add('file', FileType::class, [
                'label' => 'Télécharger le fichier',
                'required' => false,  // Optional file upload
                'mapped' => false,    // Not mapped to the entity field
                'attr' => [
                    'class' => 'file',  // Class to initialize the file input widget
                    'id' => 'input-id', // ID for the file input (can be targeted with JS)
                    'data-show-preview' => 'true',  // Show preview of file
                ]
            ])
           

            ->add('matiere', EntityType::class, [
                'label'=>'Choisissez la matière',
                'attr'=>[
                    'aria-label'=>'Choisissez la matière',
                ],
                'class' => Matiere::class,
                'choice_label' => 'libelle',
                'placeholder'=>'Choisissez la matière',
            ])
            ->add('fichier', HiddenType::class,)
            ->add('promotion', EntityType::class, [
                'label'=>'Promotion(s)',
                'attr'=>[
                    'aria-label'=>'Promotion(s)',
                ],
                'class' => Promotion::class,
                    'choice_label' => 'libelle',
                    'multiple' => true,
                    'placeholder'=>'Promotion(s)',
            ])
            
            /*
            ->add('professeur', EntityType::class, [
                'class' => Professeur::class,
'choice_label' => 'id',
            ])
            */
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
