<?php

namespace App\Form\Utilisateur;

use App\Entity\Utilisateur\Eleve;
use App\Entity\Utilisateur\ParentEleve;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ParentEleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'required'   => true,
            'disabled' => false,
        ])

        ->add('prenom', TextType::class, [
            'label' => 'Prénom',
            'required'   => true,
            'disabled' => false,
        ])

        ->add('password', TextType::class, [
            'label' => 'Mot de passe',
        'required'   => true,
        'disabled'=> false, 
        ])
            ->add('imageFile', VichImageType::class)  // Correct usage of VichImageType
            ->add('eleves', EntityType::class, [
                'class' => Eleve::class,
                'choice_label' => function (Eleve $eleve){
                    return $eleve->getPrenom().' '.$eleve->getNom();
                },
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParentEleve::class,
        ]);
    }
}
