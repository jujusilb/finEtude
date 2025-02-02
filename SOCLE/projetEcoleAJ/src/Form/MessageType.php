<?php

namespace App\Form;

use App\Entity\Membre;
use App\Entity\Message;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('membre', EntityType::class, [
            'class' => Membre::class,
            'choice_label' => 'nom',
        ])
            ->add('sujet', TextType::class, [])
            ->add('contenu', TextareaType::class, [])
            ->add('privatif', ChoiceType::class, [
                'choices' => [
                    'non' => false,
                    'oui' => true
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
