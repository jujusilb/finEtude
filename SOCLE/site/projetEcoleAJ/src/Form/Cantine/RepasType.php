<?php

namespace App\Form\Cantine;

use App\Entity\Utilisateur\Membre;
use App\Entity\Cantine\Menu;
use App\Entity\Cantine\Repas;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class RepasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
           ->add('date', DateType::class, [
                'label'=>'Choisissez la date',
                'placeholder' => [
                    'year' => 'Année',
                    'month' => 'Mois',
                    'day' => 'Jour',
                ],
                'attr' => [
                    'aria-label' => 'Choisissez la date',
                    'class' => 'd-inline',
                    
                ]
            ])
            ->add('heure', ChoiceType::class, [
                'label' => 'Choisissez l\'heure',
                'choices' => [
                    'Midi' => 'Midi',
                    'Soir' => 'Soir',
                ],
                'placeholder'=>'Choisissez l\'heure',
                'attr' =>[
                    'aria-label' => 'Choisissez l\'heure'
                ]
            ])
            ->add('menu', EntityType::class, [
                'class' => Menu::class,
                'choice_label' => function(Menu $menu){
                    return 
                    $menu->getEntree()->getLibelle().
                    ' - '.
                    $menu->getPlat()->getLibelle().
                    ' - '.
                    $menu->getFromage()->getLibelle().
                    ' - '.
                    $menu->getDessert()->getLibelle();
                },
                'placeholder'=>'Choisissez le menu',
            ])
            ->add('prix', MoneyType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Repas::class,
        ]);
    }
}
