<?php

// Le Type définit la structure et les contraintes du formulaire

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            // Title
            ->add('title', TextType::class, [

                // Label options
                'label' => "Titre du livre",
                // 'label_attr' => [
                //     'class' => "my-awesome-style",
                // ],

                // Make it required
                'required' => true,
                
                // Field attributes
                'attr' => [
                    // 'class' => "my-awesome-style",
                    'placeholder' => "Saisir le titre du livre"
                ],

                // Field helper
                'help' => "Saisir le titre du livre",
                'help_attr' => [
                    // 'class' => "my-awesome-style"
                ],

                // Form constraints
                'constraints' => [
                    new NotBlank([
                        'message' => "Le titre est obligatoire"
                    ])
                ]
            ])

            // Description
            ->add('description', TextareaType::class)

            // Cover
            ->add('cover')

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
