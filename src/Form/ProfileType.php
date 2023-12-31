<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Profile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;

class ProfileType extends AbstractType
{
    public function __construct(
        private TranslatorInterface $translator
    ) {}

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName', TextType::class, [
                'label' => $this->translator->trans('Prénom'),
                'attr' => [
                    'placeholder' => $this->translator->trans('Prénom'),
                ],
                'required' => 'true',
                'help' => $this->translator->trans('John'),
                'help_attr' => [
                    'class' => 'text-muted',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Veuillez saisir votre prénom'),
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your first name should be at least {{ limit }} characters',
                        'max' => 255,
                        'maxMessage' => 'Your first name should be no more than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('LastName', TextType::class, [
                'label' => $this->translator->trans('Nom'),
                'attr' => [
                    'placeholder' => $this->translator->trans('Nom'),
                ],
                'required' => 'true',
                'help' => $this->translator->trans('John'),
                'help_attr' => [
                    'class' => 'text-muted',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Veuillez saisir votre nom'),
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your first name should be at least {{ limit }} characters',
                        'max' => 255,
                        'maxMessage' => 'Your first name should be no more than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('Country', CountryType::class, [
                'label' => $this->translator->trans('Veillez choisir votre pays'),
                'attr' => [
                    'placeholder' => $this->translator->trans('Veillez choisir votre pays'),
                ]
            ])
            ->add('City', TextType::class, [
                'attr' => [
                    'placeholder' => $this->translator->trans('Veillez choisir votre ville'),
                ]
            ])
            // le Birthday dois avoir au moins 18 ans
            ->add('Birthday', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\Date(),
                    new Assert\LessThan('-18 years'),  // -18 years
              ]
            ])
            ->add('PhoneNumber', TelType::class, [
                'label' => $this->translator->trans('Veillez entrer votre numéro de téléphone'),
                'attr' => [
                    'placeholder' => $this->translator->trans('Veillez entrer votre numéro de téléphone'),
                ]
            ])
            ->add('Job', TextType::class, [
                'label' => $this->translator->trans('Veillez entrer votre emploi'),
                'attr' => [
                    'placeholder' => $this->translator->trans('Veillez entrer votre emploi'),
                ]
            ])
            ->add('Size', ChoiceType::class, [
                'choices' => $this->generateSizeChoices(),
            ])
            ->add('Weight', ChoiceType::class, [
                'choices' => $this->generateWeightChoices(),
            ])
            ->add('Familly', EntityType::class, [
                'class' => 'App\Entity\Familly',
                'choice_label' => 'Name',
            ])
            ->add('AboutMe', TextareaType::class, [
                'label' => 'About Me', 
                'required' => false,
                'attr' => [
                    'placeholder' => $this->translator->trans('A propos de vous'),
                ]
            ])
            ->add('LookFor', TextareaType::class, [
                'label' => 'About Me', 
                'required' => false,
                'attr' => [
                    'placeholder' => $this->translator->trans('votre recherche'),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'placeholder' => $this->translator->trans('Valider'),
                    'class' => 'btn btn-rose',
                ] 
            ])
            ->add('Pictures', FileType::class, [
                'label' => 'Drop files here or click to upload.',
                'multiple' => true,
                'mapped' => false,
                'required' => false,
                'help' => 'Allowed file types: jpg, jpeg',
                'help_attr' => [
                    'class' => 'text-muted',
                ],
                'attr' => [
                    'is' => 'drop-files',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid JPG document',
                    ])
                ],
            ] )
        ;
    }

    private function generateSizeChoices()
    {
        $choices = [];

        // Boucle de 1.50 à 2.10 avec un pas de 0.01
        for ($i = 150; $i <= 210; $i++) {
            $size = number_format($i / 100, 2); // Convertir en décimal avec deux chiffres après la virgule
            $choices[$size] = $size;
        }

        return $choices;
    }

    private function generateWeightChoices()
    {
        $choices = [];

        // Exemple de boucle de 50 à 150 avec un pas de 1
        for ($i = 50; $i <= 150; $i++) {
            $weight = $i;
            $choices[$weight] = $weight;
        }

        return $choices;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Profile::class,
            'constraints' => [
                new Assert\Valid(),
            ],
        ]);
    }
}
