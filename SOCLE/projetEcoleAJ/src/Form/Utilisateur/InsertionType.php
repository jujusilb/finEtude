<?php

namespace App\Form\Utilisateur;

use App\Entity\Utilisateur\Insertion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InsertionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('imageName')
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('username')
            ->add('charte')
            ->add('date_embauche', null, [
                'widget' => 'single_text'
            ])
            ->add('poste')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Insertion::class,
        ]);
    }
}
