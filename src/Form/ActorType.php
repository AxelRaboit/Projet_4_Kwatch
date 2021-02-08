<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\Actor;
use App\Entity\Country;
use App\Repository\CountryRepository;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ActorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('nationality', TextType::class, [
                'label' => 'Nationalité',
            ])
            ->add('country', EntityType::class, [
                'label' => 'Pays',
                'class' => Country::class,
                'choice_label' => 'nom_fr_fr',
                'query_builder' => function (CountryRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.nom_fr_fr', 'ASC');
                },
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner la description de l\'acteur(trice).',
                    ]),
                    new Length([
                        'min' => 20,
                        'minMessage' => 'Écrire {{ limit }} caractères minimum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 4000,
                    ]),
                ],
            ])
            ->add('pictureFile', VichFileType::class, [
                'label' => 'Image',
                'required' => false,
                'allow_delete' => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
                'delete_label' => 'Supprimer l\'image actuelle'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
        ]);
    }
}
