<?php

namespace App\Form\Cantine;


use App\Entity\Cantine\Menu;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ajaxEntree', TextType::class, [
                'label'=>'Choisissez une entrée',
                'mapped' =>false,
                'attr'=> [
                    'aria-label'=>'Choisissez une entrée',
                    'placeholder'=> 'Choisissez une Entrée'
                ],
                'required' => true,
            ]) 
            ->add('entree_id', HiddenType::class, [
                'mapped' =>false,
            ])    
        
            ->add('ajaxPlat', TextType::class, [
                'label'=>'Choisissez un plat',
                'mapped' =>false,
                'attr'=> [
                    'aria-label'=>'Choisissez un plat',
                    'placeholder'=> 'Choisissez un plat'
                ],
                'required'=>true,
                ])
            ->add('plat_id', HiddenType::class, [
                'mapped' =>false,
            ])

        ->add('ajaxFromage', TextType::class, [
            'label'=>'Choisissez un fromage',
            'mapped' =>false,
            'attr'=> [
                'aria-label'=>'Choisissez un fromage',
                'placeholder'=> 'Choisissez un fromage'
            ],
            'required'=>true,
            ]) 
        ->add('fromage_id', HiddenType::class, [
            'mapped' =>false,
        ])

        ->add('ajaxDessert', TextType::class, [
            'label'=>'Choisissez un dessert',
            'mapped' =>false,
            'attr'=> [
                'aria-label'=>'Choisissez un dessert',
                'placeholder'=> 'Choisissez un dessert'
            ],
            ]) 
        ->add('dessert_id', HiddenType::class, [
            'mapped' =>false,
        ])    
        

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
