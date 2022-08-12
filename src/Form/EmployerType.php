<?php

namespace App\Form;

use App\Entity\Employes;
use App\Form\EmployerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class EmployerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('telephone', TextType::class)
            ->add('email')
            ->add('adresse')
            ->add('poste')
            ->add('salaire')
            ->add('datedenaissance', DateType::class, array(
                'widget' => 'choice',
                'years' => range(date('Y')-70, date('Y-14')),
                'format' => 'dd-MM-yyyy',
              ));

            

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
