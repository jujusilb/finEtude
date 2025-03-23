<?php

namespace App\Form\Boutique;
use App\Entity\Boutique\CategorieProduit;
use App\Entity\Boutique\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('libelle', TextType::class, [
            'label' => 'Libellé du Produit',
            'attr' =>[
                'aria-label' => 'Libellé du Produit',
                'placeholder' => 'Libellé du Produit'
            ]
        ])
        ->add('Type', EntityType::class, [
            'label' => 'Type de produit',
            'class'=> CategorieProduit::class,
            'choice_label'=>'libelle',
            'attr' =>[
                'aria-label' => 'Type de Produit',
                'placeholder' => 'Type de produit'
            ]
        ])
        ->add('description', TextareaType::class, [
            'label' => 'Description du produit',
            'attr' =>[
                'aria-label' => 'Description du produit',
                'placeholder' => 'Description du produit'
            ]
        ])
            ->add('Prix', MoneyType::class, [
                'label' => 'Prix du produir',
                'attr' =>[
                    'aria-label' => 'Prix du produir',
                    'placeholder' => 'Prix du produir'
                ]
            ])
            ->add('stock', IntegerType::class, [
                'label' => 'Unité du produit',
                'attr' =>[
                    'aria-label' => 'Unité du produit',
                    'placeholder' => 'Unité du produit'
                ]
            ])
            ->add('archive', CheckBoxType::class, [
                'label' => 'Archiver le produit',
                'attr' =>[
                    'aria-label' => 'Archiver le produit',
                    'placeholder' => 'Archiver le produit'
                ],
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
