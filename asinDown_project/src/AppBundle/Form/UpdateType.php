<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class UpdateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', TextType::class, array(
        'attr' => array('readonly' => true)))
        ->add('password', PasswordType::class)
        ->add('nombre', TextType::class)
        ->add('apellidos', TextType::class)
        ->add('telefono', TelType::class)
        ->add('direccion', TextType::class)
        ->add('correo', EmailType::class)
        ->add('programa', TextType::class)
        ->add('disponibilidad', TextType::class)
        ->add('diversidad', TextType::class)
        ->add('tipoUsuario', TextType::class)
        ->add('save', SubmitType::class, array('label' => 'Actualizar'));

    }
}
