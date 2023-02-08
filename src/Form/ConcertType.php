<?php

namespace App\Form;

use App\Entity\Concert;
use App\Entity\Band;
use App\Entity\Stage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ConcertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'choice',
                'format' => 'dd / MM / yyyy'
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom de la tournée'
            ])
            ->add('prix', NumberType::class, [
                'label' => 'Prix'
            ])
            ->add('band', EntityType::class, [
                'class' => Band::class,
                'choice_label' => 'name'
            ])
            ->add('stage', EntityType::class, [
                'class' => Stage::class,
                'choice_label' => 'name'
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concert::class,
        ]);
    }
}
