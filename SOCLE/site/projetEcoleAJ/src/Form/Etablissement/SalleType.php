<?php

namespace App\Form\Etablissement;

use App\Entity\Etablissement\Etage;
use App\Entity\Etablissement\Salle;
use App\Entity\Pedagogie\Promotion;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label'=> 'Libellé du Pôle',
                'attr'=> [
                    'aria-label' =>'Libellé du Pôle',
                    'placeholder'=>'Libellé du Pôle'
                ]
            ])
            ->add('etage', EntityType::class, [
                'class' => Etage::class,
                'placeholder'=>'Choisissez l\'étage',
                'choice_label' => 'libelle',
            ])
            ->add('promotion', EntityType::class, [
                'class' => Promotion::class,
                    'choice_label' => 'libelle',
                    'multiple' => true,
            ])
            ->add('promoPrincipale', EntityType::class, [
                'class' => Promotion::class,
                'choice_label' => 'libelle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Salle::class,
        ]);
    }
}
