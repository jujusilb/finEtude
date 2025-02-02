<?php

namespace App\Form;
use App\Entity\Eleve;
use App\Entity\ParentEleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ParentEleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [])
        ->add('prenom', TextType::class, [])
        ->add('email', TextType::class, [])
        ->add('password', TextType::class, [])
        ->add('Eleve', EntityType::class,[
            'class' => Eleve::class,
            'choice_label' => 'nom',
            'multiple' => true,
        ])
        ->add('roles', ChoiceType::class, [
            'choices' => [
                'ROLE_USER' => 'ROLE_USER',
                'ROLE_ADMIN' => 'ROLE_ADMIN',
            ],
            'multiple' => true,  // Allow multiple roles to be selected
            'expanded' => true,   // Use checkboxes to select multiple roles
        ])
        ->add('imageFile', VichImageType::class)  // Correct usage of VichImageType
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParentEleve::class,
        ]);
    }
}
