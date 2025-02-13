<?php

namespace App\Form;

use App\Entity\Utilisateur\Secretariat;
use App\Entity\Forum\Message;
use App\Entity\Forum\Thread;
use App\Entity\Utilisateur\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('requerant', TextType::class, [
                'label'=>'De la part de :'])
            ->add('destinataire', EntityType::class, [
                'class'=>Secretariat::class,
                'choice_label' => function (Secretariat $secretariat){
                    return $secretariat->getPrenom().' '.$secretariat->getNom();
                },
            'label' => 'Pour :'])
            ->add('sujet', TextType::class, [ 
                'label' => 'Sujetdu message :'
            ])
            ->add('contenu', TextAreaType::class, [
            'label' => 'Votre message :'])
            ->getForm();

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
