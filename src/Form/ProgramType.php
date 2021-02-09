<?php

namespace App\Form;

use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner le titre de la série.',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Écrire {{ limit }} caractères minimum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                    ]),
                ],
            ])
            ->add('synopsis', TextareaType::class, [
                'label' => 'Synopsis',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner le synopsis de la série.',
                    ]),
                    new Length([
                        'min' => 40,
                        'minMessage' => 'Écrire {{ limit }} caractères minimum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 4000,
                    ]),
                ],
            ])
            ->add('posterFile', VichFileType::class, [
                'label'        => 'Affiche de la série',
                'required'     => false,
                'allow_delete' => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
                'delete_label' => 'Supprimer l\'image actuelle'
            ])
            ->add('country', TextType::class, [
                'label' => 'Pays',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner le pays de la série.',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Écrire {{ limit }} caractères minimum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                    ]),
                ],
            ])
            ->add('category', null, [
                'label' => 'Categorie',
                'choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
