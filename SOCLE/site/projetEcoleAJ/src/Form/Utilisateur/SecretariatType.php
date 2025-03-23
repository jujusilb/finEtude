<?php

namespace App\Form\Utilisateur;
use App\Entity\Etablissement\Pole;
use App\Entity\Utilisateur\Secretariat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class SecretariatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('civilite', ChoiceType::class, [
            "label"=>'civilité',
            'attr'=>[
                'aria-label'=>'civilité',
            ],
            'choices'=> [
                'Monsieur'=>'Monsieur',
                'Madame'=>'Madame',
            ],
            'required'=>true,
            'expanded'=>true
        ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' =>[
                    'aria-label' => 'Nom',
                    'placeholder' => 'Nom'
                ],
                'required'   => true,
                'disabled' => false,
            ])
            ->add('pole', EntityType::class,[
                'class'=>Pole::class,
                'choice_label'=>'libelle',
                'expanded'=>true,
                'multiple'=>true
            ])
            ->add('imageFile', VichImageType::class, [
                'label'=>'Photo de profil'
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Préom',
                'attr' =>[
                    'placeholder' => 'Prénom',
                    'aria-label' => 'Prénom'
                ],
                'required'   => true,
                'disabled' => false,  
            ])
            ->add('motDePasse', PasswordType::class, [
                'label' => 'Mot de passe',
                'mapped'=>false,
                'attr' =>[
                    'aria-label' => 'Mot de passe',
                    'placeholder' => 'Mot de passe'
                ],
                'required' => $options['validation_groups'] !== ['edition'],
                'disabled'=> false, 
            ])

            ->add('date_embauche', DateType::class, [
                'label' => 'Date d\'embauche',
                'placeholder' =>[
                        'year' => 'Année',
                        'month'=> 'Mois',
                        'day' => 'Jour',
                ],
                'attr' => [
                    'aria-label' =>'Date d\'embauche',
                ]
            ]) 
            ->add('poste', TelType::class, [
                'label' => 'Poste',
                'attr' => [
                    'aria-label' => 'Poste',
                    'placeholder' => '0123456789'
                ]
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Secretariat::class,
        ]);
    }
}
