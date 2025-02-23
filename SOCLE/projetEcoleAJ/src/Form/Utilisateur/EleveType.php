<?php

namespace App\Form\Utilisateur;

use App\Entity\Utilisateur\Eleve;
use App\Entity\Pedagogie\Promotion;

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
class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' =>[
                    'aria-label' => 'Nom',
                    'placeholder' => 'Nom'
                ],
                'required'   => true,
                'disabled' => false,
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' =>[
                    'placeholder' => 'Prénom',
                    'aria-label' => 'Prénom'
                ],
                'required'   => true,
                'disabled' => false,
            ])
            ->add('password', TextType::class, [
                'label' => 'Mot de passe',
                'attr' =>[
                    'aria-label' => 'Mot de passe',
                    'placeholder' => 'Mot de passe'
                ],
                'required'   => true,
                'disabled'=> false, 
            ])
            ->add('imageFile', VichImageType::class)
            ->add('promotion', EntityType::class, [
                'attr' => [
                    'aria-label' => 'Promotion',
                    'placeholder' =>'Choisissez la promotion',
                    'class' => 'form-select'
                ],
                'class' => Promotion::class,
                'choice_label' => 'libelle',
                ])
                ->add('imageFile', VichImageType::class, [
                    'required'=>false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
