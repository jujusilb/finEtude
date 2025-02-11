<?php

namespace App\Form\Professionnel;

use App\Entity\Professionnel\Entreprise;
use App\Entity\Professionnel\Professionnel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfessionnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [])
            ->add('prenom', TextType::class, [])
            ->add('email', EmailType::class, [])
            ->add('telephone', TelType::class,[])
            ->add('profession', TextType::class, [])
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
'choice_label' => 'libelle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professionnel::class,
        ]);
    }
}
