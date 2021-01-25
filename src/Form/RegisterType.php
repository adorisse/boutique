<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                    'minMessage' => 'Votre prénom doit être au moins {{ limit }} caractères',
                    'maxMessage' => 'Votre prénom ne peut pas comporter plus de {{ limit }} caractères',
                ]),
                'attr' => [
                    'placeholder' => 'Votre Prénom ici'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                    'minMessage' => 'Votre Nnom doit être au moins {{ limit }} caractères',
                    'maxMessage' => 'Votre Nnom ne peut pas comporter plus de {{ limit }} caractères',
                ]),

                'attr' => [
                    'placeholder' => 'Votre Nom ici'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Mail',
                'attr' => [
                    'placeholder' => 'Votre Adresse Mail ici'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Vos mots de passe ne sont pas identique!',
                'required' => true,
                'first_options' => ['label' => 'Mot de Passe'],
                'second_options' => ['label' => 'Confirmez le mot de passe'],
                'label' => 'Mot de Passe',
                'attr' => [
                    'placeholder' => 'Votre Mot de Passe ici'
                ]
            ])





            ->add('submit', SubmitType::class, [

                'label' => "S'inscrire"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
