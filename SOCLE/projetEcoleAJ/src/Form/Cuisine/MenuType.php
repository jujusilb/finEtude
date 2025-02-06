<?php

namespace App\Form\Cuisine;

use App\Entity\Cuisine\Dessert;
use App\Entity\Cuisine\Entree;
use App\Entity\Cuisine\Fromage;
use App\Entity\Cuisine\Menu;
use App\Entity\Cuisine\Plat;
use App\Entity\Cuisine\Viande;
use App\Entity\Cuisine\Legume;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('entree', EntityType::class, [
            'class' => Entree::class,
                'choice_label' => 'libelle',
            ])    
        
        ->add('plat', EntityType::class, [
                'class' => Plat::class,
                'choice_label' => function (Plat $plat){
                        return $plat->getViande()->getLibelle().
                        ' - '.
                        $plat->getLegume()->getLibelle();
                        },
            ])
            ->add('fromage', EntityType::class, [
                'class' => Fromage::class,
                'choice_label' => 'libelle',
            ])
            ->add('dessert', EntityType::class, [
                'class' => Dessert::class,
                    'choice_label' => 'libelle',
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
