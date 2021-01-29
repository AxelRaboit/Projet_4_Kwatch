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
/*             ->add('poster', TextType::class, [
                'label' => 'Poster'
            ]) */
            ->add('posterFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
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
            ->add('category', null, ['choice_label' => 'name'])
            ->add('save', SubmitType::class, [
                'label' => 'Sauvegarder'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
