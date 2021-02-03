<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\Actor;
use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('actor', EntityType::class, [
                'required' => false,
                'label' => 'Acteur',
                'class' => Actor::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'by_reference' => false
            ])
            ->add('program', EntityType::class, [
                'required' => false,
                'label' => 'Série',
                'class' => Program::class,
                'choice_label' => 'title',
                'multiple' => false,
                'expanded' => false,
                'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Role::class,
        ]);
    }
}
